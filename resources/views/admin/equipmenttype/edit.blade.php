<form action="{{ route('admin.equipmenttype.update',['id' =>$equipment->id]) }}" method="POST" id="roleForm">
    @csrf
    <div class="offcanvas-body">
        <div class="form-group mb-4">
            <label class="form-label">Equipment Type Name: <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ $equipment->name }}" placeholder="Enter a equipment name">
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
