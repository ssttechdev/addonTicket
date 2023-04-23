function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete"
        || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

docReady(function () {
    var resultContainer = document.getElementById('qr-reader-results');
    var lastResult, countResults = 0;
    function onScanSuccess(decodedText, decodedResult) {
        if (decodedText !== lastResult) {
            ++countResults;
            lastResult = decodedText;
            $.ajax({
		
                type: "POST",
                url: "<?php ?>Checkin/Check/",
                data: decodedText,
                dataType: "json",
                cache : false,
                success: function(data){

                    if(data.success == true){
                     alert("Update Success");
                     $('#noTc').attr('value', data.parkingcode);
                     $('#idParking').attr('value', data.ticketid);
                     $('#amtTc').attr('value', data.amttc);
                     //self.location.replace('http://localhost/parksys/index.php/Checkin/Check');
                    } else {
                     alert("The credentials not match!");
                     self.location.replace('https://theciliwung.com/app/parksys/Checkin/');
                    }
                } ,error: function(xhr, status, error) {
                    alert(error);
                },
            });

            console.log(`Scan result ${decodedText}`, decodedResult);
        }
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", { fps: 30, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
});