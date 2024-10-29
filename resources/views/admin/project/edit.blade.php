<form action="{{ route('admin.project.update',['id' =>$project->id]) }}" method="POST" id="roleForm">
    @csrf
    <div class="offcanvas-body">
        <div class="form-group mb-4">
            <label class="form-label">Customer: <span class="text-danger">*</span></label>
            <select class="form-control" name="user_id">
                <option value="">Select</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $project->user_id ? 'selected' : "" }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-4">
            <label class="form-label">Project Name: <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ $project->name }}" placeholder="Enter a project name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="px-4 gap-2 d-flex align-items-center ht-80 border border-end-0 border-gray-2">
        <button type="submit" class="btn btn-success w-50">Update</button>
        <a href="javascript:void(0);" class="btn btn-danger w-50" data-bs-dismiss="offcanvas">Cancel</a>
    </div>
</form>