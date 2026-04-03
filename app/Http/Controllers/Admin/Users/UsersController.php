<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsersCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Activation;


class UsersController extends Controller
{
    public function index(Request $request)
    {
       if ($request->ajax()) {

            $users = User::query();

            return datatables()->eloquent($users)

                ->addColumn('actions', function ($user) {
                    $editUrl = route('users.edit', $user->id);
                    $deleteUrl = route('users.destroy', $user->id);

                    return '
                <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu kaydı silmek istediğinize emin misiniz?\')">Sil</button>
                </form>';
                })->rawColumns(['actions'])->make(true);
        }

        return view('panel.users.index');
    }


    public function add()
    {

        return view('panel.users.add');
    }

    public function store(UsersCreateRequest $request)
    {
        try {
            $user =User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'permissions' => $request->permissions
            ]);

             // 2. Aktivasyon oluştur
            $activation = Activation::create($user);

            // 3. Aktivasyonu tamamla (aktif hale getir)
            Activation::complete($user, $activation->code);

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Kullanıcı oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('users')->with('success', 'Kullanıcı Başarıyla Eklendi');

    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('panel.users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        try {
            $users->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'permissions' => $request->permissions
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Kullanıcı güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('users')->with('success', 'Kullanıcı Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('users')->with('success', 'Kullanıcı Başarıyla Silindi');
    }

}
