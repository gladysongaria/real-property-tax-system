<!--PAY TAXES MODAL-->
<div class="modal fade" id="taxpayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background: #459b96;">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>TAX PAYMENT</strong></h1>
            </div>
            <div class="modal-body">
                <form action="{{ route('tax-payments.pay-taxes') }}" method="POST">
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

                    <div class="container">
                        <div class="row">
                            <div class="col-4 form-check">
                                <input class="form-check-input" type="checkbox" id="isOwnerTaxpayer"
                                    name="is_owner_taxpayer">
                                <label class="form-check-label" for="isOwnerTaxpayer">
                                    Owner is the Tax Payer
                                </label>
                            </div>
                            <div class="col-4 form-check ">
                                <input class="form-check-input" type="checkbox" id="noPenaltyApplied" name="no_penalty">
                                <label class="form-check-label" for="noPenaltyApplied">
                                    No Penalty
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <p><strong>Queued Property/ies</strong></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Tax Declaration</th>
                                <th scope="col">Barangay</th>
                                <th scope="col">Assessed Value</th>
                                <th scope="col">Term(from)</th>
                                <th scope="col">Term(To)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="queued_properties"></tbody>
                    </table>

                    <div class="mt-4">
                        <label for="selectProperties" class="form-label"><strong>Select Property/ies</strong></label>
                        <input class="mb-3 form-control" type="search" id="property_search" placeholder="Search">
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
    const searchInput = document.getElementById('property_search');

    function createAvailablePropertyRow(propertyId, propertyInfo) {
        const restoredRow = document.createElement('tr');
        restoredRow.setAttribute('id', `property_${propertyId}`);
        restoredRow.innerHTML = `
            <td>${propertyInfo.owners}</td>
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
        return restoredRow;
    }

    function createQueuedPropertyRow(propertyId, propertyInfo) {
        const paymentTerms = propertyInfo.payment_terms || [];
        let termOptions = '';

        paymentTerms.forEach(term => {
            if (!term.paid) {
                termOptions += `<option value="${term.id}">${term.year}</option>`;
            }
        });

        const newRow = document.createElement('tr');
        newRow.setAttribute('id', `queued_${propertyId}`);
        newRow.innerHTML = `
            <td>${propertyInfo.tax_declaration}</td>
            <td>${propertyInfo.barangay}</td>
            <td>${propertyInfo.assess_value}</td>
            <td>
                <select name="particulars[${propertyId}][term]" class="form-select" required>
                    ${termOptions}
                </select>
            </td>
             <td>
                <select name="particulars[${propertyId}][term]" class="form-select" required>
                    ${termOptions}
                </select>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-danger remove-from-queue" data-id="${propertyId}">
                    Remove
                </button>
                <input type="hidden" name="particulars[${propertyId}][property_id]" value="${propertyId}">
                <input type="hidden" data-info='${JSON.stringify(propertyInfo)}'>
            </td>
        `;
        return newRow;
    }

    availablePropertiesTable.addEventListener('click', (event) => {
        if (event.target.classList.contains('add-to-queue')) {
            const button = event.target;
            const propertyId = button.getAttribute('data-id');
            const propertyInfo = JSON.parse(button.getAttribute('data-info'));
            const paymentTerms = propertyInfo.payment_terms;

            if (!paymentTerms || paymentTerms.length === 0) return;

            const newRow = createQueuedPropertyRow(propertyId, propertyInfo);
            queuedPropertiesTable.appendChild(newRow);
            document.getElementById(`property_${propertyId}`).remove();
        }
    });

    queuedPropertiesTable.addEventListener('click', (event) => {
        if (event.target.classList.contains('remove-from-queue')) {
            const button = event.target;
            const propertyId = button.getAttribute('data-id');
            const queuedRow = document.getElementById(`queued_${propertyId}`);
            const propertyInfo = JSON.parse(queuedRow.querySelector('input[data-info]').dataset.info);

            queuedRow.remove();

            const restoredRow = createAvailablePropertyRow(propertyId, propertyInfo);
            availablePropertiesTable.appendChild(restoredRow);

            searchInput.dispatchEvent(new Event('input'));
        }
    });

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase();
        const rows = availablePropertiesTable.querySelectorAll('tr');

        function isMatch(query, ...fields) {
            return fields.some(field => field.toLowerCase().includes(query));
        }

        rows.forEach(row => {
            const ownerText = row.cells[0]?.textContent.toLowerCase() || '';
            const taxDeclarationText = row.cells[1]?.textContent.toLowerCase() || '';
            row.style.display = isMatch(query, ownerText, taxDeclarationText) ? '' : 'none';
        });
    });
});
</script>
