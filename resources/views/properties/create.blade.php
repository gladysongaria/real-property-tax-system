<!-- NEW PROPERTY MODAL -->
<div class="modal fade" id="new_property" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background: #459b96;">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>NEW PROPERTY</strong></h1>
            </div>
            <div class="modal-body">
                <form action="{{route('properties.store')}}" method="POST">
                    @csrf
                    <h5>Owner Profile</h5>
                    <div id="owners-container">
                        <div class="owner-group">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="last_name[]" class="form-label"><strong>Last Name</strong></label>
                                        <input type="text" class="form-control" name="last_name[]" value="{{ old('last_name') }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="first_name[]" class="form-label"><strong>First Name</strong></label>
                                        <input type="text" class="form-control" name="first_name[]" value="{{ old('first_name') }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="middle_name[]" class="form-label"><strong>Middle Name</strong></label>
                                        <input type="text" class="form-control" name="middle_name[]" value="{{ old('middle_name') }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="ext_name[]" class="form-label"><strong>Ext Name</strong></label>
                                        <input type="text" class="form-control" name="ext_name[]" value="{{ old('ext_name') }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="address[]" class="form-label"><strong>Address</strong></label>
                                        <input type="text" class="form-control" name="address[]" value="{{ old('address') }}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label for="status[]" class="form-label"><strong>Status</strong></label>
                                    <select name="status[]" class="form-control" required>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-danger remove-owner mt-2">Remove Owner</button>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success mb-3" id="add-owner">Add Another Owner</button>

                    <h5>Property Profile</h5>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="tax_declaration" class="form-label"><strong>Tax Declaration</strong></label>
                                <input type="text" class="form-control" name="tax_declaration" value="{{ old('tax_declaration') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="location" class="form-label"><strong>Location</strong></label>
                                <input type="text" class="form-control" name="location" value="{{ old('location') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="barangay" class="form-label"><strong>Barangay</strong></label>
                                <input type="text" class="form-control" name="barangay" value="{{ old('barangay') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="classification_id" class="form-label"><strong>Classification</strong></label>
                            <select name="classification_id" class="form-control" required>
                                @foreach($classifications as $classification)
                                    <option value="{{ $classification->id }}">{{ $classification->classification_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="market_value" class="form-label"><strong>Market Value</strong></label>
                                <input type="number" class="form-control" name="market_value" value="{{ old('market_value') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="assessed_value" class="form-label"><strong>Assessed Value</strong></label>
                                <input type="number" class="form-control" name="assessed_value" value="{{ old('assessed_value') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="sub_class" class="form-label"><strong>Sub Class</strong></label>
                                <input type="text" class="form-control" name="sub_class" value="{{ old('sub_class') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="previous_td" class="form-label"><strong>Previous TD</strong></label>
                                <input type="number" class="form-control" name="previous_td" value="{{ old('previous_td') }}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="date_approved" class="form-label"><strong>Date Approved</strong></label>
                                <input type="date" class="form-control" name="date_approved" value="{{ old('date_approved') }}">
                            </div>
                        </div>
                    </div>
                    <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                        <button class="btn btn-lg" id="cust_but" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <!--modal-content-->
    </div>
    <!--modal-dialog-->
</div>

<script>
    // Add new owner input fields
    document.getElementById('add-owner').addEventListener('click', function () {
        const container = document.getElementById('owners-container');
        const newOwner = container.querySelector('.owner-group').cloneNode(true);

        // Clear the inputs in the cloned fields
        newOwner.querySelectorAll('input').forEach(input => input.value = '');
        newOwner.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

        container.appendChild(newOwner);
    });

    // Remove an owner input group
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-owner')) {
            e.target.closest('.owner-group').remove();
        }
    });
</script>
