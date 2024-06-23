document.addEventListener("DOMContentLoaded", function() {
    var amountInput = document.getElementById("amount");
    var confirmAmountInput = document.getElementById("confirm_amount");
    var minimumAmountInput = document.getElementById("minimum_amount");

    var submitButton = document.getElementById("submitBtn");

    submitButton.addEventListener("click", validateAmount);

    function validateAmount(event) {
        var amountValue = parseFloat(amountInput.value);
        var confirmAmountValue = parseFloat(confirmAmountInput.value);
        var minimumAmountValue = parseFloat(minimumAmountInput.value);

        if (amountValue !== confirmAmountValue) {
            event.preventDefault(); 
            // alert("Os valores devem ser iguais!");
            swal({
                title: "Ops...",
                text: "Os campos quantidade e confirme a quantidade precisam ter o mesmo valor !", 
            });
        }

        if(amountValue < minimumAmountValue) {
            event.preventDefault(); 
            // alert("A quantidade minima não pode ser maior do que a quantidade geral!");
            swal({
                title: "Ops...",
                text: "A quantidade minima não pode ser maior do que a quantidade geral !", 
            });
        }
    }
});