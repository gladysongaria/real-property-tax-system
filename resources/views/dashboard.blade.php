@extends('master')
@section('js')
<script src="{{ asset('assets/dashboard/dashboard.js') }}"></script>
@endsection
@section('content')

<div class=" content_custi" style="width: 100%;">
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Owner/s</th>
                <th>Tax Declaration</th>
                <th>Location</th>
                <th>Barangay</th>
                <th>Assessed Value</th>
                <th>Market Value</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
            <tr>
                <th scope="row">
                    @foreach ($property->owners as $owner)
                    {{ $owner->last_name }}, {{ $owner->first_name }} {{ $owner->middle_name ?? '' }}
                    @if (!$loop->last)
                    |
                    @endif
                    @endforeach
                </th>
                <td>{{ $property->tax_declaration }}</td>
                <td>{{ $property->location }}</td>
                <td>{{ $property->barangay }}</td>
                <td>{{ $property->assess_value }}</td>
                <td>{{ $property->market_value }}</td>
                <td>
                    <!-- Edit Button -->
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $property->id }}">
                        <i class="bi bi-pencil"></i>
                    </button>

                    <!-- Delete Button -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#delete{{$property->id}}">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $property->id }}" tabindex="-1"
                    aria-labelledby="editModalLabel{{ $property->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $property->id }}">Edit Property</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('properties.update', $property->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <!-- Property Fields -->
                                    <div class="mb-3">
                                        <label for="tax_declaration_{{ $property->id }}" class="form-label">Tax
                                            Declaration</label>
                                        <input type="text" name="tax_declaration"
                                            id="tax_declaration_{{ $property->id }}" class="form-control"
                                            value="{{ $property->tax_declaration }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location_{{ $property->id }}" class="form-label">Location</label>
                                        <input type="text" name="location" id="location_{{ $property->id }}"
                                            class="form-control" value="{{ $property->location }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="classification_id_{{ $property->id }}"
                                            class="form-label">Classification</label>
                                        <select name="classification_id" id="classification_id_{{ $property->id }}"
                                            class="form-select" required>
                                            @foreach($classifications as $classification)
                                            <option value="{{ $classification->id }}" {{ $classification->id ==
                                                $property->classification_id ? 'selected' : '' }}>
                                                {{ $classification->classification_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Owners Section -->
                                    <div id="owners_{{ $property->id }}">
                                        <h5>Owners</h5>
                                        @foreach($property->owners as $index => $owner)
                                        <div class="owner-group">
                                            <input type="hidden" name="owner_id[]" value="{{ $owner->id }}">
                                            <div class="mb-3">
                                                <label for="last_name_{{ $property->id }}_{{ $index }}"
                                                    class="form-label">Last Name</label>
                                                <input type="text" name="last_name[]"
                                                    id="last_name_{{ $property->id }}_{{ $index }}" class="form-control"
                                                    value="{{ $owner->last_name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="first_name_{{ $property->id }}_{{ $index }}"
                                                    class="form-label">First Name</label>
                                                <input type="text" name="first_name[]"
                                                    id="first_name_{{ $property->id }}_{{ $index }}"
                                                    class="form-control" value="{{ $owner->first_name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address_{{ $property->id }}_{{ $index }}"
                                                    class="form-label">Address</label>
                                                <input type="text" name="address[]"
                                                    id="address_{{ $property->id }}_{{ $index }}" class="form-control"
                                                    value="{{ $owner->address }}" required>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="delete{{$property->id}}" tabindex="-1"
                    aria-labelledby="deleteLabel{{$property->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteLabel{{$property->id}}">Confirm Delete</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the property with Tax Declaration <strong>{{
                                    $property->tax_declaration }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm">
            <button type="button" class="btn btn-cust btn-lg" id="cust_but" data-bs-toggle="modal"
                data-bs-target="#taxpayment">PAY TAXES</button>
        </div>
    </div>

    @include('tax_payment.index')

</div>

@endsection
