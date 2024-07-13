// Form Validations

let today = new Date().toISOString().split('T')[0]; //To know what today date is
document.getElementById('date').setAttribute('min', today); //set minimum date being present


document.getElementById('ClubName').addEventListener('keypress', function (e) {
    let char = String.fromCharCode(e.which);
    if (/[0-9]/.test(char)) {
        e.preventDefault();
    }
});

document.getElementById('ContactName').addEventListener('keypress', function (e) {
    let char = String.fromCharCode(e.which);
    if (!/[a-zA-Z- ]/.test(char)) {
        e.preventDefault();
    }
});

let fields = ['ContactName', 'child1FirstName', 'child1LastName', 'child2FirstName', 'child2LastName', 'child3FirstName', 'child3LastName', 'child4FirstName', 'child4LastName'];

fields.forEach(function(field) {
    document.getElementById(field).addEventListener('keypress', function (e) {
        let char = String.fromCharCode(e.which);
        if (!/[a-zA-Z- ]/.test(char)) {
            e.preventDefault();
        }
    });
});


// //Put K infront and also limit to only 4 char
let clubNumberInput = document.getElementById('Club#');
clubNumberInput.oninput = function(e) {
    let str = e.target.value.substring(1).toUpperCase();
    str = str.replace(/[^0-9a-zA-Z]/g, ''); // remove non-alphanumeric characters
    if (str.length > 3) {
        str = str.substring(0, 3); // limit to 3 characters
    }
    e.target.value = 'K' + str;
};


//Limit Postcode to only numbers and also limit to 4 char only
document.getElementById('PostAddress').addEventListener('input', function (e) {
    let input = e.target.value;
    if (input.length > 4 || /[^0-9]/.test(input)) {
      e.target.value = input.slice(0, -1);
    }
  });

  //Limit Phone Number to only numbers and also limit to 10 char only
document.getElementById('Phone').addEventListener('input', function (e) {
    let input = e.target.value;
    if (input.length > 10 || /[^0-9]/.test(input)) {
      e.target.value = input.slice(0, -1);
    }
  });


function updateSize(index) {
    let buyGIId = 'buyGI' + index;
    let GISizeSelectId = 'GISizeSelect' + index;
    let giAlertId = 'giAlert' + index;

    let buyGI = document.getElementById(buyGIId);
    let giSelect = document.getElementById(GISizeSelectId);
    let giAlert = document.getElementById(giAlertId);

    if (buyGI.value === "yes") {
        giSelect.disabled = false;
        giAlert.textContent = ''; // Clear the alert message
    } else {
        giSelect.disabled = true;
        document.getElementById('GISizeSelect' + index).value = '';
        updateAmount(index); //To ensure totals are updated when toggling off
        if (buyGI.value === "no") {
            giAlert.textContent = 'Gi is required to Participate'; // Set the alert message
        } else {
            giAlert.textContent = ''; // Clear the alert message
        }
    }
    updateTotal();
}



function toggleChildFields(childNumber, isChecked) {
    let childFields = document.getElementById('child' + childNumber + 'Fields');
    let childFirstName = document.getElementById('child' + childNumber + 'FirstName');
    let childLastName = document.getElementById('child' + childNumber + 'LastName');
    let childMembership = document.getElementById('child' + childNumber + 'Membership');
    let buyGI = document.getElementById('buyGI' + childNumber);
    let giSelect = document.getElementById('GISizeSelect' + childNumber);
    let giPurchase = document.getElementById('giPurchase' + childNumber);

    if (isChecked) {
        childFields.style.display = 'block';
        giPurchase.style.display = 'block';
        childFirstName.disabled = false;
        childLastName.disabled = false;
        childMembership.disabled = false;
        childFirstName.required = true;
        childLastName.required = true;
        childMembership.required = true;
        buyGI.required = true;
        giSelect.required = true;

        // Check if the selected membership is 'N/A'
        if (childMembership.value === '0') {
            childMembership.setCustomValidity('Please select a membership option.');
        } else {
            childMembership.setCustomValidity('')
        }


    } else {
        childFields.style.display = 'none';
        giPurchase.style.display = 'none';
        childFirstName.disabled = true;
        childLastName.disabled = true;
        childMembership.disabled = true;
        // Remove required attribute
        childFirstName.required = false;
        childLastName.required = false;
        // Clear values when hiding fields
        childFirstName.value = '';
        childLastName.value = '';
        childMembership.value = '';
        // Reset the membership select to "N/A"
        giSelect.value = '';
        updateAmount(childNumber); //To ensure totals are updated when toggling off
        giSelect.required = false;

    }
    updateTotal();
}


function updateAmount(childNumber) {
    // Get the selected values
    let childMembershipValue = document.getElementById('child' + childNumber + 'Membership').value;
    let GISizeSelectValue = document.getElementById('GISizeSelect' + childNumber).value;

    // Convert the values to numbers if necessary
    let childMembershipAmount = parseInt(childMembershipValue) || 0;
    let GISizeSelectAmount = parseInt(GISizeSelectValue) || 0;

    // Update the table cells with the calculated amounts
    document.getElementById('child' + childNumber + 'MembershipAmount').textContent = '$' + childMembershipAmount.toFixed(0);
    document.getElementById('child' + childNumber + 'GIAmount').textContent = '$' + GISizeSelectAmount.toFixed(0);

    // Calculate and update the total amount for the current child
    let childTotalAmount = childMembershipAmount + GISizeSelectAmount;
    document.getElementById('child' + childNumber + 'TotalAmount').textContent = '$' + childTotalAmount.toFixed(0);

    // Call a function to update the overall total and other totals if needed
    updateTotal();
}

function updateTotal() {
    // Initialize total amount
    let totalAmount = 0;
    let shippingCost = 0;

    // Iterate over each child and add their total amount to the total
    for (let i = 1; i <= 4; i++) {
        let childTotalAmountElement = document.getElementById('child' + i + 'TotalAmount');
        let childTotalAmount = parseFloat(childTotalAmountElement.textContent.replace('$', '')) || 0;
        totalAmount += childTotalAmount;
    }

    //Check delivery method
    let deliveryMethodShip = document.getElementById("Shipped").checked;
    let deliveryMethodPick = document.getElementById("Pickup").checked;
    if (deliveryMethodShip) {
        shippingCost = 10;
    }
    else if (deliveryMethodPick) {
        shippingCost = 0;
    }

    // Update the total amount in the table
    document.getElementById('updateTotal').textContent = '$' + totalAmount.toFixed(0);
    document.getElementById('grandTotal').textContent = '$' + (((totalAmount) * 1.1) + shippingCost).toFixed(0);
    document.getElementById('GST').textContent = '$' + ((totalAmount) * 0.1).toFixed(0);
    document.getElementById('Shipping').textContent = '$' + (shippingCost).toFixed(0);
    //Can add additional tipyes of calculations here if needed
}


['child1Membership', 'child2Membership', 'child3Membership', 'child4Membership'].forEach(function(id) {
    document.getElementById(id).addEventListener("change", function() {
        if (this.value === '0') {
            this.setCustomValidity('Please select a membership option.');
        } else {
            this.setCustomValidity('');
        }
    })
});



// Amount Updatess
function amount1() {
    updateAmount(1);
    updateTotal();
}

function amount2() {
    updateAmount(2);
    updateTotal();
}

function amount3() {
    updateAmount(3);
    updateTotal();
}

function amount4() {
    updateAmount(4);
    updateTotal();
}
