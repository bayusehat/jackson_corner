<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DataTables;
use App\Models\Player;

class PlayerController extends Controller
{
    public function loadList(Request $request){
        if ($request->ajax()) {
            $data = Player::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at',function($row){
                    $date = date('d/m/Y H:i',strtotime($row->created_at));
                    return $date;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="edit('.$row->id_players.')"><i class="fas fa-edit"></i></a> 
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deletePlayer('.$row->id_players.')"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function insert(Request $request){
        $rules = [
            'nama_lengkap' => 'required',
            'gender' => 'required',
            'whatsapp_number' => 'required|min:10',
            'email' => 'required',
            'username_instagram' => 'required',
            'usia' => 'required',
            'know_jackson_active' => 'required',
        ];

        $isValid = Validator::make($request->all(),$rules);
        
        if($isValid->fails()){
            return response(['status' => 400, 'errors' => $isValid->errors()]);
        }else{
            $p = new Player;
            $p->nama_lengkap = $request->input('nama_lengkap');
            $p->gender = $request->input('gender');
            $p->whatsapp_number = $request->input('whatsapp_number');
            $p->email = $request->input('email');
            $p->username_instagram = $request->input('username_instagram');
            $p->usia = $request->input('usia');
            $p->nama_komunitas = $request->input('nama_komunitas');
            $p->know_jackson_active = $request->input('know_jackson_active');
            $p->know_jackson_from = $request->input('know_jackson_from');
            if(!$request->input('other_answer')){
                $p->other_answer = $request->input('other_answer');
            }
            if($p->save()){
                return response(['status' => 200, 'message' => 'Berhasil menambahkan player']);
            }else{
                return response(['status' => 500, 'message' => 'Terjadi kesalahan! gagal menambahkan player']);
            }
        }
    }

    public function destroy($id_player){
        $player = Player::find($id_player);
        if($player){
            $player->delete();
            return response(['status' => 200,'message' => 'Berhasil menghapus data Player']);
        }

        return response(['status' => 500,'message' => 'Terjadi kesalahan, data player gagal terhapus!']);
    }

    public function edit($id_player){
        $player = Player::find($id_player);
        if($player){
            return response(['status' => 200, 'data' => $player]);
        }

        return response(['status' => 500, 'message' => 'Data tidak ditemukan / tidak ada data!']);
    }
    

    public function update(Request $request, $id_player){
        $p = Player::find($id_player);
        $rules = [
            'nama_lengkap' => 'required',
            'gender' => 'required',
            'whatsapp_number' => 'required|min:10',
            'email' => 'required',
            'username_instagram' => 'required',
            'usia' => 'required',
            'know_jackson_active' => 'required',
            'know_jackson_from' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);
        
        if($isValid->fails()){
            return response(['status' => 400, 'errors' => $isValid->errors()]);
        }else{
            $p->nama_lengkap = $request->input('nama_lengkap');
            $p->gender = $request->input('gender');
            $p->whatsapp_number = $request->input('whatsapp_number');
            $p->email = $request->input('email');
            $p->username_instagram = $request->input('username_instagram');
            $p->usia = $request->input('usia');
            $p->nama_komunitas = $request->input('nama_komunitas');
            $p->know_jackson_active = $request->input('know_jackson_active');
            $p->know_jackson_from = $request->input('know_jackson_from');
            if(!$request->input('other_answer')){
                $p->other_answer = $request->input('other_answer');
            }
            if($p->save()){
                return response(['status' => 200, 'message' => 'Berhasil merubah data player']);
            }else{
                return response(['status' => 500, 'message' => 'Terjadi kesalahan! gagal menrubah data player']);
            }
        }
    }


}
