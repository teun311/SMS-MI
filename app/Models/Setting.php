<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['site_title','site_name','site_logo','site_icon','site_banner','site_address','site_dist','site_division','site_country','site_meta'];
    protected static $setting;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;


    public static function getImgUrl($request,$name,$url=null)
    {
        self::$image     = $request->file($name);
        if (self::$image)
        {
            self::$imageName =time().rand(10,1000).'.'.self::$image->getClientOriginalExtension();
            self::$imageUrl  ='admin/deail-img/';
            self::$image->move(self::$imageUrl,self::$imageName);
            self::$directory = self::$imageUrl.self::$imageName;
            return self::$directory;
        }
        else return $url;
    }


    public static function saveData($request)
    {
        $Row = Setting::first();
        if (isset($Row))
        {
            self::$setting = Setting::find($Row->id);
        }
        else
        {
            self::$setting = new Setting();
        }

        if ($request->setting_category == 'basic')
        {
            self::$setting->site_title  = $request->site_title;
            self::$setting->site_name   = $request->site_name;
            self::$setting->site_logo   = self::getImgUrl($request,$name='site_logo');
            self::$setting->site_icon   = self::getImgUrl($request,$name='site_icon');
            self::$setting->site_banner = $request->site_banner;
        }
        elseif ($request->setting_category == 'address')
        {

            self::$setting->site_address  = $request->site_address;
            self::$setting->site_dist     = $request->site_dist;
            self::$setting->site_division = $request->site_division;
            self::$setting->site_country  =$request->site_country;
            self::$setting->site_meta     =$request->site_meta;
        }
        self::$setting->save();

    }
    public static function updateDate($request,$id)
    {
        self::$setting = Setting::find($id);
        if ($request->setting_category == 'basic')
        {
            self::$setting->site_title  = $request->site_title;
            self::$setting->site_name   = $request->site_name;
            if ($request->file('site_logo'))
            {
                if (file_exists(self::$setting->site_logo))
                {
                    unlink(self::$setting->site_logo);
                }
                self::$setting->site_logo   = self::getImgUrl($request,$name='site_logo');
            }
            if ($request->file('site_icon'))
            {
                if (file_exists(self::$setting->site_icon))
                {
                    unlink(self::$setting->site_icon);
                }
                self::$setting->site_icon   = self::getImgUrl($request,$name='site_icon');
            }


            self::$setting->site_banner = $request->site_banner;
        }
        elseif ($request->setting_category == 'address')
        {
            self::$setting->site_address  = $request->site_address;
            self::$setting->site_dist     = $request->site_dist;
            self::$setting->site_division = $request->site_division;
            self::$setting->site_country  =$request->site_country;
            self::$setting->site_meta     =$request->site_meta;
        }
        self::$setting->save();
    }
}
