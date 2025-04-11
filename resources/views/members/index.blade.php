@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Group Members</h1>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            {{ $errors->first('msg') }}
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="flex gap-2">
            <input type="text" name="name" class="form-control" placeholder="Member Name" required>
            <button type="submit" class="btn btn-success">Add Member</button>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-4 bg-white">
        <thead class="bg-blue-200">
            <tr>
                <th>Name</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $member->id }}">Edit</button>

                        <!-- Modal -->
                        <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $member->id }}" aria-hidden="true">
                          <div class="modal-dialog">
                            <form action="{{ route('members.update', Crypt::encrypt($member->id)) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $member->id }}">Edit Member</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  </div>
                                </div>
                            </form>
                          </div>
                        </div>
                        <!-- End Modal -->

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
