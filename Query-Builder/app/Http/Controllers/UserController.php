<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show() 
    {
        
        $users = DB::table('users')
        //jbh where lgaya ho uske baad hi orwhere use krna hai
                    //whereIn('id',[18,20])//mujhe yhi records chahiye //same bss beech mai Not likhdo 
                    // ->whereNull('email') //same for NotNull
                    // ->orderBy('name')
                    // ->orderBy('email')
                    // ->get();
                    //orWhere()for multiple condition
                    //y nhi to yeh hona chahiye 
                    //whereBetween('id',[3,6]) //jaise marks itne se itne hai 
                    //whereNotBetween('id',[3,6]) //jaise marks itne se itne  na ho 
                    // ->pluck('name','email'); //ek array mai saare name, and agr 2 fields likhi hai to key value pair bnega pluck function se 
                    // ->where('email','ric@gmail.com')
                    //used for conditions 
                    // ->where('name','like','H%')
                    //where clause mai arry bna k multiple condition lga skte hain
                    // ->get();
                    // ->select('name')
                    //to select particular column
                    // ->distinct()
                    //agr values repeat ho to y single tym hi show krega repeated show nhi krega
                    
        // return $users;
        //normal json form mai aise return krwate hai 

        // $users = DB::table('users')->where('id','=','1')-> get(); //with where clause
        // return $users;

        // $users = DB::table('users')->where('name','=','Richa')->orWhere('email','=','richa@gmail.com')-> get(); //for multiple conditions 
        // return $users;
        // dd($users); array ki form mai print krwata hai 

        // foreach($users as $user)
        // {
        //     echo $user->name . "<br>";
        // }
        //sidhe controller mai bhi call krwa skte hai using query builder

        // $users = DB::table('users')->where('id',2)->get();

        //Find array return krta hai json nhi and usme return bhi normal karwayenge

        // ->latest()
        // ->inRandomOrder()
        // ->first();

        // ->limit(2)
        // ->offset(0)
        // ->get();
        // return $users;

        //to count 
            // ->count();
            // ->max('age');
            // ->min('age');
            //  return $users;


            ->get();
        return view('allusers',['data' => $users]);
    }

    public function SingleUser(string $id) 
    {
        $users = DB::table('users')->where('id',$id)->get();//id fetch ki
        return view('user',['data' => $users]);
    }

    //to add new user

    // (1)insert 
    // (2)insertOrIgnore()
    // (3)upsert()
    // (4)insertGetId()

    public function AddUser()
    {
        $user = DB::table('users')
              ->insertOrIgnore([
                 [ 
                     'name' => 'Richi Rich',
                     'email' => 'Chunni@gmail.com',
                     'age' => 14
                 ]

              ]);
            // dd($user); show krega ki value insert hui ya nhi true-false btake
            if($user)
            {
                echo "<h1> Data Successfully added</h1>";
            }
            else{
                echo "<h1> Data Not inserted </h1>";
            }

            //using upsert

            // $user = DB::table('users')
            //        ->upsert(
            //         [
            //             'name' => 'kanan ',
            //             'email' => 'abc@gmail.com',
            //             'age' => 9,
            //         ],
            //         ['email'] //jis field se wo check kr rha hai 
            //         //['name']//Jo field update krani hai (is case mai jo filed likhoge usi particular field ko change krega)
            //         );

            //     if($user)
            //         {
            //             echo "<h1> Data Successfully added</h1>";
            //         }
            //     else{
            //             echo "<h1> Data Not inserted </h1>";
            //         }

            // By insertGetId (yeh sirf autoincrement wali id mai chlta hai)

            // $user = DB::table('users')
            // ->insertGetId(
            //     [
            //         'name' => 'Amitabh Bachan ',
            //         'email' => 'amitabh@gmail.com',
            //         'age' => 45,
            //     ],
            
            // );
            // return $user;
            //  if($user)
            //      {
            //          echo "<h1> Data Successfully added</h1>";
            //      }
            //  else{
            //          echo "<h1> Data Not inserted </h1>";
            //      }   
    }

    //to update user data
    public function updateUser()
    {
        // $user = DB::table('users')
        // ->where('id',2) //sare where yha use kr skte hain
        // ->update([
        //     'email' => 'harbans@gmail.com',
        // ]);

        // if($user)
        //     {
        //         echo "<h1> Data Successfully added</h1>";
        //     }
        // else{
        //         echo "<h1> Data Not inserted </h1>";
        //     } 

            $user = DB::table('users')
                    ->where('id',2) //sare where yha use kr skte hain
                    ->updateOrInsert(
                        [ 
                            'name' => 'Riha',
                            'email' => 'harbans@gmail.com',
                        ],
                        [ 
                            'age' => '2',
                        ]
                    );

            if($user)
                {
                    echo "<h1> Data Successfully added</h1>";
                }
            else{
                    echo "<h1> Data Not inserted </h1>";
                } 
    }
    

}
