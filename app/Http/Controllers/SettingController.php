<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Traits\ImageUpload;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;
class SettingController extends BaseController
{
    use ImageUpload;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->setPageTitle('Settings', 'Manage Settings');
        return view('settings.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {

        if ($request->has('site_logo') && ($request->file('site_logo') )) {

            if (config('settings.site_logo') != null) {
                $this->deleteOne('images/'.config('settings.site_logo'));
            }
            $logo       = $request->file('site_logo');

            $filename    = $logo->getClientOriginalName();

            $path=public_path().'/images/';
            $logo->move($path,$filename);

            // $path=public_path().'/full/';
            // $imageWidth=$imageHeight=300;
            // $destination=public_path().'/thumbnail/';

            // $this->UploadImage($path,$filename,$imageWidth,$imageHeight,$destination,$image);

            Setting::set('site_logo', $filename);

        } elseif ($request->has('site_favicon') && ($request->file('site_favicon'))) {

            if (config('settings.site_favicon') != null) {
                $this->deleteOne('images/'.config('settings.site_favicon'));
            }
            $favicon = $request->file('site_favicon');

            $filename    = $favicon->getClientOriginalName();

            $path=public_path().'/images/';
            $favicon->move($path,$filename);

            Setting::set('site_favicon', $filename);

        } else {

            $keys = $request->except('_token');

            foreach ($keys as $key => $value)
            {
                Setting::set($key, $value);
            }
        }
        return $this->responseRedirectBack('Settings updated successfully.', 'success');
    }


}
