<!--PAY TAXES MODAL-->
<div class="modal fade" id="taxpayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background: #459b96;">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>TAX PAYMENT</strong></h1>
            </div>
            <div class="modal-body">
                <form action="{{ route('tax-payments.store-multiple') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="taxpayername" class="form-label"><strong>Tax Payer Name</strong></label>
                                <input type="text" class="form-control" id="taxpayername" name="taxpayer_name" required>
                            </div>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="orno" class="form-label"><strong>OR No.</strong></label>
                                <input type="text" class="form-control" id="orno" name="or_number" required>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="ordate" class="form-label"><strong>OR Date</strong></label>
                                <input type="date" class="form-control" id="ordate" name="or_date" required>
                            </div>
                        </div>
                    </div>

                    <p><strong>Queued Property/ies</strong></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Tax Declaration</th>
                                <th scope="col">Barangay</th>
                                <th scope="col">Assessed Value</th>
                                <th scope="col">Term</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="queued_properties"></tbody>
                    </table>

                    <div class="mt-4">
                        <label for="selectProperties" class="form-label"><strong>Select Property/ies</strong></label>
                        <input class="form-control mb-3" type="search" id="property_search" placeholder="Search">
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Owner/s</th>
                                <th scope="col">Tax Declaration</th>
                                <th scope="col">Location</th>
                                <th scope="col">Barangay</th>
                                <th scope="col">Assessed Value</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="available_properties">
                            @foreach ($properties as $property)
                            <tr id="property_{{ $property->id }}">
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
                                <td>
                                    @if ($property->paymentTerms->isNotEmpty())
                                    <button type="button" class="btn btn-sm btn-primary add-to-queue"
                                        data-id="{{ $property->id }}" data-info="{{ json_encode($property) }}">
                                        Add
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-secondary" disabled>No Unpaid
                                        Terms</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-lg btn-success" id="cust_but">PAY TAX</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--END OF PAY TAXES MODAL-->

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const availablePropertiesTable = document.getElementById('available_properties');
    const queuedPropertiesTable = document.getElementById('queued_properties');
    const searchInput = document.getElementById('property_search'); // Search input field

    // Add event listener to search input
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase();

        // Loop through the rows in the available properties table
        const rows = availablePropertiesTable.querySelectorAll('tr');
        rows.forEach(row => {
            const ownerCell = row.cells[0]; // Owner(s) cell
            const taxDeclarationCell = row.cells[1]; // Tax Declaration cell

            // Check if the query matches any part of the owner's name or tax declaration
            const ownerText = ownerCell ? ownerCell.textContent.toLowerCase() : '';
            const taxDeclarationText = taxDeclarationCell ? taxDeclarationCell.textContent.toLowerCase() : '';

            // Show or hide the row based on the search query
            if (ownerText.includes(query) || taxDeclarationText.includes(query)) {
                row.style.display = ''; // Show the row
            } else {
                row.style.display = 'none'; // Hide the row
            }
        });
    });

    // Add event listener for adding properties to the queue
    document.querySelectorAll('.add-to-queue').forEach(button => {
        button.addEventListener('click', () => {
            const propertyId = button.getAttribute('data-id');
            const propertyInfo = JSON.parse(button.getAttribute('data-info'));
            const paymentTerms = propertyInfo.payment_terms; // Unpaid terms

            if (!paymentTerms || paymentTerms.length === 0) return;

            // Generate dropdown options for the term
            let termOptions = '';
            paymentTerms.forEach(term => {
                termOptions += `<option value="${term.id}">${term.year}</option>`;
            });

            // Add to queued properties
            const newRow = document.createElement('tr');
            newRow.setAttribute('id', `queued_${propertyId}`);
            newRow.innerHTML = `
                <td>${propertyInfo.tax_declaration}</td>
                <td>${propertyInfo.barangay}</td>
                <td>${propertyInfo.assess_value}</td>
                <td>
                    <select name="term[${propertyId}]" class="form-select" required>
                        ${termOptions}
                    </select>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger remove-from-queue" data-id="${propertyId}">Remove</button>
                    <input type="hidden" name="property_ids[]" value="${propertyId}">
                </td>
            `;
            queuedPropertiesTable.appendChild(newRow);

            // Remove from available properties
            document.getElementById(`property_${propertyId}`).remove();

            // Add event listener to the new "Remove" button
            newRow.querySelector('.remove-from-queue').addEventListener('click', () => {
                // Remove from queue
                newRow.remove();

                // Restore to available properties
                const restoredRow = document.createElement('tr');
                restoredRow.setAttribute('id', `property_${propertyId}`);
                restoredRow.innerHTML = `
                    <td>${propertyInfo.owner.last_name}, ${propertyInfo.owner.first_name}</td>
                    <td>${propertyInfo.tax_declaration}</td>
                    <td>${propertyInfo.location}</td>
                    <td>${propertyInfo.barangay}</td>
                    <td>${propertyInfo.assess_value}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary add-to-queue"
                            data-id="${propertyId}"
                            data-info='${JSON.stringify(propertyInfo)}'>
                            Add
                        </button>
                    </td>
                `;
                availablePropertiesTable.appendChild(restoredRow);

                // Reattach add-to-queue listener
                restoredRow.querySelector('.add-to-queue').addEventListener('click', button.click);

                // Reapply the search functionality to the restored row
                searchInput.dispatchEvent(new Event('input'));
            });
        });
    });
});


</script>
