<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingsUpdateRequest;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class SettingsController extends Controller
{
    public function index()
    {
        $settings = Settings::firstOrCreate([]);
        return view('panel.settings.index', compact('settings'));
    }

    public function update(SettingsUpdateRequest $request)
    {
        $settings = Settings::firstOrCreate([]);

        try {

            $logo = $settings->logo;
            $favicon = $settings->favicon;
            $footer_logo = $settings->footer_logo;
            $orta_banner = $settings->orta_banner;
            $baskan_photo = $settings->baskan_photo;

            // Logo işlemleri
            if ($request->hasFile('logo')) {
                if ($request->logo) {
                    Storage::delete('settings/' . $request->logo, 'public');
                }
                $logo = hash('sha256', $request->file('logo')->getClientOriginalName() . time())
                    . '.' . $request->file('logo')->getClientOriginalExtension();
                $request->file('logo')->storeAs('settings', $logo, 'public');
            }

            // Favicon işlemleri
            if ($request->hasFile('favicon')) {
                if ($request->favicon) {
                    Storage::delete('settings/' . $request->favicon, 'public');
                }
                $favicon = hash('sha256', $request->file('favicon')->getClientOriginalName() . time())
                    . '.' . $request->file('favicon')->getClientOriginalExtension();
                $request->file('favicon')->storeAs('settings', $favicon, 'public');
            }

            // Footer Logo işlemleri
            if ($request->hasFile('footer_logo')) {
                if ($request->footer_logo) {
                    Storage::delete('settings/' . $request->footer_logo, 'public');
                }
                $footer_logo = hash('sha256', $request->file('footer_logo')->getClientOriginalName() . time())
                    . '.' . $request->file('footer_logo')->getClientOriginalExtension();
                $request->file('footer_logo')->storeAs('settings', $footer_logo, 'public');
            }

            // Orta Banner işlemleri
            if ($request->hasFile('orta_banner')) {
                if ($request->orta_banner) {
                    Storage::delete('settings/' . $request->orta_banner, 'public');
                }
                $orta_banner = hash('sha256', $request->file('orta_banner')->getClientOriginalName() . time())
                    . '.' . $request->file('orta_banner')->getClientOriginalExtension();
                $request->file('orta_banner')->storeAs('settings', $orta_banner, 'public');
            }

            // Başkan Foto işlemleri
            if ($request->hasFile('baskan_photo')) {
                if ($request->baskan_photo) {
                    Storage::delete('settings/' . $request->baskan_photo, 'public');
                }
                $baskan_photo = hash('sha256', $request->file('baskan_photo')->getClientOriginalName() . time())
                    . '.' . $request->file('baskan_photo')->getClientOriginalExtension();
                $request->file('baskan_photo')->storeAs('settings', $baskan_photo, 'public');
            }


            // Güncelleme işlemleri burada yapılacak
            $settings->update([
                'footer_logo' => $footer_logo,
                'orta_banner' => $orta_banner,
                'baskan_photo' => $baskan_photo,
                'favicon' => $favicon,
                'logo' => $logo,
                'title' => $request->title,
                'url' => $request->url,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email,
                'address' => $request->address,
                'google_maps' => $request->google_maps,
                'google_analytics' => $request->google_analytics,
                'facebook_url' => $request->facebook_url,
                'youtube_url' => $request->youtube_url,
                'twitter_url' => $request->twitter_url,
                'linkedin_url' => $request->linkedin_url,
                'copyright' => $request->copyright,
                'privacy_policy' => $request->privacy_policy,
                'kvkk' => $request->kvkk,
                'baskan_fullname' => $request->baskan_fullname,
                'suggestion_status' => $request->has('suggestion_status') ? 1 : 0,
                'site_status' => $request->has('site_status') ? 1 : 0
            ]);


        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Ayarlar güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('settings')->with('success', 'Ayarlar Başarıyla Güncellendi');
    }
}
