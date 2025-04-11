<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GroupMember;
use Illuminate\Support\Facades\Crypt;

class GroupMemberController extends Controller
{
    public function index()
    {
        $members = GroupMember::all();
        return view('members.index', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $memberCount = GroupMember::count();
        if ($memberCount >= 3) {
            return back()->withErrors(['msg' => 'Maximum of 3 members only.']);
        }

        GroupMember::create([
            'name' => $request->name,
        ]);

        return redirect()->route('members.index');
    }

    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $member = GroupMember::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $member->update([
            'name' => $request->name,
        ]);

        return redirect()->route('members.index');
    }
}
