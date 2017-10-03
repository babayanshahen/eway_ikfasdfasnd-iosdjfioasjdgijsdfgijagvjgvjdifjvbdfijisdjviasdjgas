function deleteConf(userId) {
    var scroll = $(window).scrollTop();
    if (confirm("Համոզված ես") == true) {
        location.href = base_url + 'user/deleteitem/beauty_salon_model/' + userId +'/'+ scroll
    }
}

function changeItem(userId) {
    location.href = base_url + 'user/changeitem/beauty_salon_model/' + userId
}