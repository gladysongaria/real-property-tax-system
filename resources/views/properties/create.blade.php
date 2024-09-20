{{-- Create Modal --}}

<div class="modal fade" id="create" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">
                    New Property </h5>
            </div>

            <div class="modal-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">

                        {{-- last_name --}}
                        <div class="col-md-6">
                            <div class="mb-0 position-relative"><br>
                                <label class="form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input name='last_name' class="form-control" required type="text"
                                        value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- add calamity button --}}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect waves-light"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
