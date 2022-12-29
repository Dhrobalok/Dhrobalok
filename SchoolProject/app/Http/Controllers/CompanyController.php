<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Client;
use App\Models\Upcomingcourse;
use Validator;
use Alert;
use Str;
use DB;
use App\Models\Link;
use App\Models\Story;

class CompanyController extends Controller
{
    public function index()
    {
        $allslider=Slider::get();
        return view('backend.admin.sliderImage',compact('allslider'));
    }

    public function save()
    {

      return view('backend.admin.createSlide');



    }

    public function imageSave(Request $request)
    {
        $profile_photo_path1=0;
        $this->validate($request, [
            'image' => 'required',
            'image.*' => '|mimes:jpeg,png,jpg,gif,svg|max:3072',
         ]);




         if($request->hasfile('image'))
          {
             foreach($request->file('image') as $image)
             {
                $image_name = Str :: random(20);
                $extension = strtolower($image -> getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $extension;
                $upload_path = 'images/';
                $image_url = $upload_path.$image_full_name;
                $image -> move($upload_path,$image_full_name);
                $profile_photo_path1 = $image_url;

                $slider=new Slider;
                $slider->image = $profile_photo_path1;
                $slider->save();
             }
          }


          toast('Slider Added Successfully!','success','animated','toastMixin');
          return redirect()->route('Slider.image');

    }

    public function delete($id)
    {
        DB::table('sliders')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function Client()
    {
        $allclient=Client::get();
       return view('backend.admin.Clientimage',compact('allclient'));
    }

    public function Clientsave()
    {

       return view('backend.admin.createClient');



    }

    public function ClientImageSave(Request $request)
    {
        $profile_photo_path1=0;
        $this->validate($request, [
            'image' => 'required',
            'image.*' => '|mimes:jpeg,png,jpg,gif,svg|max:3072',
         ]);




         if($request->hasfile('image'))
          {
             foreach($request->file('image') as $image)
             {
                $image_name = Str :: random(20);
                $extension = strtolower($image -> getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $extension;
                $upload_path = 'images/';
                $image_url = $upload_path.$image_full_name;
                $image -> move($upload_path,$image_full_name);
                $profile_photo_path1 = $image_url;

                $slider=new Client;
                $slider->image = $profile_photo_path1;
                $slider->save();
             }
          }

          toast('Client Added Successfully!','success','animated','toastMixin');
          return redirect()->route('Client');

    }

    public function upcomingCourse()
    {
      $allupcoming=Upcomingcourse::where('status','upcoming')->get();
      return view('backend.admin.UpcomingCourse',compact('allupcoming'));
    }

    public function createUpcoming()
    {
      return view('backend.admin.createUpcoming');
    }

    public function UpcomingSave(Request $request)
    {
      $profile_photo_path1=0;
      $this->validate($request, [
          'image' => 'required',
          'image.*' => '|mimes:jpeg,png,jpg,gif,svg|max:3072',
       ]);



       if($request->hasfile('image'))
       {
          foreach($request->file('image') as $index=>$image)
          {
             $image_name = Str :: random(20);
             $extension = strtolower($image -> getClientOriginalExtension());
             $image_full_name = $image_name . '.' . $extension;
             $upload_path = 'images/';
             $image_url = $upload_path.$image_full_name;
             $image -> move($upload_path,$image_full_name);
             $profile_photo_path1 = $image_url;

             $slider=new Upcomingcourse;
             $slider->name=$request->name[$index];
             $slider->image = $profile_photo_path1;
             $slider->status = "upcoming";
             $slider->date = null;
             $slider->time = null;
             $slider->save();
          }
       }

       toast('Upcoming Course Added Successfully!','success','animated','toastMixin');
       return redirect()->route('Upcoming.course');



    }


    public function Upcomingdelete($id)
    {

        DB::table('upcomingcourses')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function Seminar()
    {
      $allupcoming=Upcomingcourse::where('status','seminar')->get();
      return view('backend.admin.Seminar',compact('allupcoming'));
    }

    public function createSeminar()
    {
      return view('backend.admin.createSeminar');
    }

    public function SeminarSave(Request $request)
    {




      $profile_photo_path1=0;
    //   $this->validate($request, [
    //       'image' => 'required',
    //       'image.*' => '|mimes:jpeg,png,jpg,gif,svg|max:3072',
    //    ]);

    // return [
    //     'image' => '|mimes:jpeg,png,jpg,gif,svg|max:3072',
    // ];
       $this->validate(
        $request,
        [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        ]
    );




       if($request->hasfile('image'))
       {
            $image=$request->file('image');
             $image_name = Str :: random(20);
             $extension = strtolower($image -> getClientOriginalExtension());
             $image_full_name = $image_name . '.' . $extension;
             $upload_path = 'images/';
             $image_url = $upload_path.$image_full_name;
             $image -> move($upload_path,$image_full_name);
             $profile_photo_path1 = $image_url;

             $slider=new Upcomingcourse;
             $slider->name=$request->name;
             $slider->image = $profile_photo_path1;
             $slider->date = $request->date;
             $slider->time = $request->time;
             $slider->status = "seminar";
             $slider->save();

       }

       toast('Seminar Added Successfully!','success','animated','toastMixin');
       return redirect()->route('Seminar');



    }


    public function Seminardelete($id)
    {

        DB::table('upcomingcourses')->where('id',$id)->delete();
        return redirect()->back();
    }


    public function Footer()
    {
       $links=Link::get();
       return view('backend.admin.Footer',compact('links'));
    }

    public function AddFooter()
    {
        return view('backend.admin.createFooter');
    }

    public function FooterSave(Request $request)
    {

        Link::where('name',$request->name)->delete();
         $link=new Link;
         $link->name=$request->name;
         $link->link=$request->link;
         $link->save();
         toast('Footer Saved!','success','animated','toastMixin');
         return redirect()->back();

    }

    public function DeleteFooter($id)
    {
        DB::table('links')->where('id',$id)->delete();
        return redirect()->back();
    }


    public function SuccessStory()
    {
        return view('backend.admin.SuccessStory');
    }

    public function AddStory()
    {
        return view('backend.admin.AddStory');
    }

    public function SaveStory(Request $request)
    {
          $story=new Story;
          $story->name=$request->name;
          $image=$request -> file('image');

        if($image)
        {
        $image_name = Str :: random(20);
        $extension = strtolower($image -> getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $extension;
        $upload_path = 'images/';
        $image_url = $upload_path.$image_full_name;
        $image -> move($upload_path,$image_full_name);
        $profile_photo_path1 = $image_url;
        }
        $story->image=$profile_photo_path1;
        $story->description=$request->description;
        $story->save();

        toast('Story Saved!','success','animated','toastMixin');
        return redirect()->back();

    }

    public function EditStory($id)
    {
        $story=Story::find($id);
        return view('backend.admin.editStory',compact('story'));
    }

    public function DeleteStory($id)
    {
        Story::where('id',$id)->delete();
        toast('Story Deleted!','success','animated','toastMixin');
        return redirect()->back();
    }

    public function UpdateStory(Request $request)
    {

        $image=$request -> file('image');
        if($image)
        {
        $image_name = Str :: random(20);
        $extension = strtolower($image -> getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $extension;
        $upload_path = 'images/';
        $image_url = $upload_path.$image_full_name;
        $image -> move($upload_path,$image_full_name);
        $profile_photo_path1 = $image_url;

        Story::where('id', $request->id)
        ->update([
        'image' => $profile_photo_path1
        ]);

        }


        Story::where('id', $request->id)
        ->update([
        'name' => $request->name,
        'description' => $request->description,

        ]);

        toast('Story Updated!','success','animated','toastMixin');
        return redirect()->back();


    }

}
