function showOptions() {
    document.getElementById("dropdownOptions").style.display = "block";
}

function hideOptions() {
    setTimeout(function () {
        document.getElementById("dropdownOptions").style.display = "none";
    }, 200);
}

function redirectToBooking(serviceId) {
    window.location.href = `/service/content/${serviceId}`;
}
