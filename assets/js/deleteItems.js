function deleteConfBeauty(userId) {
    var scroll = $(window).scrollTop();
    if (confirm("Համոզվա՞ծ ես") == true) {
        location.href = base_url + 'user/deleteitem/Beauty_salon_model/' + userId +'/'+ scroll
    }
}

function changeItemBeauty(userId) {
    location.href = base_url + 'user/changeitem/Beauty_salon_model/' + userId
}

function deleteConfHotel(userId) {
    var scroll = $(window).scrollTop();
    if (confirm("Համոզվա՞ծ ես") == true) {
        location.href = base_url + 'user/deleteitem/Hotels_model/' + userId +'/'+ scroll
    }
}

function changeItemHotel(userId) {
    location.href = base_url + 'user/changeitem/Hotels_model/' + userId
}

function deleteConfRest(userId) {
    var scroll = $(window).scrollTop();
    if (confirm("Համոզվա՞ծ ես") == true) {
        location.href = base_url + 'user/deleteitem/Restaurant_model/' + userId +'/'+ scroll
    }
}

function changeItemRest(userId) {
    location.href = base_url + 'user/changeitem/Restaurant_model/' + userId
}