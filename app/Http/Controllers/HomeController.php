<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

use App\Models\prescription;
use App\Models\prescriptionImg;
use App\Models\quotation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    
    //prescription
    public function prescriptionAll(){

        $uid = Auth::user()->id;
        if(Auth::user()->type == "2"){
            $d = DB::select("SELECT * FROM `prescriptions`");
        }else{
            $d = DB::select("SELECT * FROM `prescriptions` WHERE `cstomerId` = '$uid'");

        }
        return view("prescription")->with('data', $d);
    }

    public function prescriptionAdd(){
        return view("prescriptionAdd");
    }


    public function prescriptionAddSubmit(Request $req){
        $t = new prescription();
        $t->note = $req->note;
        $t->cstomerId = Auth::user()->id;
        $t->address = $req->address;
        $t->time = $req->time;
        $t->save();
        $id = $t->id;



        $images=array();
        if($files=$req->file('img')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;

                $tt = new prescriptionImg();
                $tt->prescriptionId = $id;
                $tt->url = $name;
                $tt->save();

            }
        }

        return redirect('/home');

    }
    //prescription end



    // /quotation
    public function quotationAdd(Request $req){
        $id = $req->id;

        $uid = Auth::user()->id;


        $d = DB::select("SELECT * FROM `prescriptions` WHERE `id` = '$id'");
        $i = DB::select("SELECT * FROM `prescription_imgs` WHERE `prescriptionId` = '$id'");
        return view("quotationAdd")->with('data', $d[0])->with('img', $i);
    }



    public function quotationSend(Request $req){
    
            $id = $req->id;
            $data = $req->data;

            foreach($data as $d){
                $t = new quotation();
                $t->prescriptionId = $id;
                $t->name = $d['name'];
                $t->qty = $d['qty'];
                $t->price = $d['ip_'];
                $t->save();
            }



            $details = [
                'title' => 'Mail about ypur Quotation',
                'id' => $req->id,
                'data' => $data
            ];

            $d = DB::select("SELECT `users`.`email` FROM `prescriptions`, `users` WHERE `cstomerId` = `users`.`id` AND `prescriptions`.`id` = '$id'");
            $email = $d[0]->email;
            
            \Mail::to($email)->send(new \App\Mail\Quotation($details));


            return 1;

    }


        
    public function quotationAll(){
        $uid = Auth::user()->id;

        if(Auth::user()->type == "2"){
        $d = DB::select("SELECT DISTINCT `prescriptionId`, `quotations`.`status` FROM `quotations`, `prescriptions` WHERE `prescriptionId` = `prescriptions`.`id`");

        }else{
            $d = DB::select("SELECT DISTINCT `prescriptionId`, `quotations`.`status` FROM `quotations`, `prescriptions` WHERE `prescriptionId` = `prescriptions`.`id` AND `prescriptions`.`cstomerId` = '$uid'");

        }

        return view("quotationAll")->with('data', $d);

    }




    public function quotationView(Request $req){

        $id = $req->id;
        $d = DB::select("SELECT * FROM `quotations` where `prescriptionId` = '$id'");
        return view("quotation")->with('data', $d)->with('id', $id);
    }





    public function quotationApproved(Request $req){
        $id = $req->id;
        DB::update("UPDATE `quotations` SET `status` = '2' WHERE `prescriptionId` = '$id'");
        return back();
    }




    public function quotationReject(Request $req){
        $id = $req->id;
        DB::update("UPDATE `quotations` SET `status` = '3' WHERE `prescriptionId` = '$id'");

        return back();
    }

    // /quotation end


}
