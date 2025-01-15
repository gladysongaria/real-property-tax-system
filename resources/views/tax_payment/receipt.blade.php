<div class="modal fade" id="taxReceiptModal" tabindex="-1" aria-labelledby="taxReceiptLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #459b96;">
                <h1 class="modal-title fs-5" id="taxReceiptLabel"><strong>OFFICIAL TAX RECEIPT</strong></h1>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <p><strong>Receipt No:</strong> <span id="receiptNo">OR-XXXXXX</span></p>
                    </div>
                    <div class="col-6 text-end">
                        <p><strong>Date:</strong> <span id="receiptDate">YYYY-MM-DD</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p><strong>Issued To:</strong> <span id="issuedTo">Taxpayer Name</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p><strong>Issued By:</strong> <span id="issuedBy">Treasurer/Collector</span></p>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Owner Name</th>
                            <th>Barangay</th>
                            <th>Location</th>
                            <th>Classification</th>
                            <th>Tax Declaration</th>
                            <th>Assessed Value</th>
                            <th>Term</th>
                            <th>Tax Due</th>
                            <th>Payment</th>
                        </tr>
                    </thead>
                    <tbody id="receiptDetails">
                        <!-- Populate dynamically -->
                    </tbody>
                </table>

                <div class="mt-4 row">
                    <div class="col-6">
                        <p><strong>Total Tax:</strong> <span id="totalTaxDue">₱0.00</span></p>
                        <p><strong>Total SEF:</strong> <span id="totalSefDue">₱0.00</span></p>
                    </div>
                    <div class="col-6 text-end">
                        <p><strong>Total Payment:</strong> <span id="totalPayment">₱0.00</span></p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <p><strong>Penalty:</strong> <span id="penaltyAmount">₱0.00</span></p>
                        <p><strong>Discount:</strong> <span id="discountAmount">₱0.00</span></p>
                    </div>
                    <div>
                        <p><strong>Balance:</strong> <span id="balanceAmount">₱0.00</span></p>
                    </div>
                </div>

                <div class="gap-2 d-grid d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-lg btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function populateReceipt(receiptData) {
    document.getElementById('receiptNo').textContent = receiptData.or_no;
    document.getElementById('receiptDate').textContent = receiptData.or_date;
    document.getElementById('issuedTo').textContent = receiptData.issued_to;
    document.getElementById('issuedBy').textContent = receiptData.issued_by;

    let receiptDetailsTable = document.getElementById('receiptDetails');
    receiptDetailsTable.innerHTML = ''; // Clear table before adding new data

    receiptData.details.forEach(detail => {
        let row = `
            <tr>
                <td>${detail.owner_name}</td>
                <td>${detail.barangay}</td>
                <td>${detail.location}</td>
                <td>${detail.classification}</td>
                <td>${detail.tax_declaration}</td>
                <td>₱${detail.assessed_value.toFixed(2)}</td>
                <td>${detail.term}</td>
                <td>₱${detail.tax_due.toFixed(2)}</td>
                <td>₱${detail.payment.toFixed(2)}</td>
            </tr>
        `;
        receiptDetailsTable.insertAdjacentHTML('beforeend', row);
    });

    document.getElementById('totalTaxDue').textContent = `₱${receiptData.total_tax_due.toFixed(2)}`;
    document.getElementById('totalSefDue').textContent = `₱${receiptData.total_sef_due.toFixed(2)}`;
    document.getElementById('totalPayment').textContent = `₱${receiptData.total_payment.toFixed(2)}`;
    document.getElementById('penaltyAmount').textContent = `₱${receiptData.penalty.toFixed(2)}`;
    document.getElementById('discountAmount').textContent = `₱${receiptData.discount.toFixed(2)}`;
    document.getElementById('balanceAmount').textContent = `₱${receiptData.balance.toFixed(2)}`;
}

</script>
