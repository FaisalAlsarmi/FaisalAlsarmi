function fetch_city(val)
{
    $.ajax({
        type: 'post',
        url: '/profile/fetch_city',
        data: {
            get_province: val
        },
        success: function (response) {
            document.getElementById("city").innerHTML = response;
        }
    });
}
