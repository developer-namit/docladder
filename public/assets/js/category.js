function mycategory(id) {
    var url = 'https://tryyourwork.com/docladder/Home/getallcategory';
    $.ajax({
        type: "post",
        url: url,
        data: { id: id },
        dataType: 'json',
        success: function(res) {

            var html = '';
            $.each(res['skill'], function(key, val) {
                html += '<div class="col-sm-4 border-end mb-3 mb-md-0">';
                html += '<div class="category-style-02" >';
                html += '<ul class="list-unstyled mb-0">';
                html += '<li>';
                html += '<a href="https://tryyourwork.com/docladder/categories/' + val['skills'] + '" target="_blank">';
                html += '<span class="category-count">';
                html += '<img class="img-fluid" src="https://tryyourwork.com/docladder/public/assets/images/docladder-icons/doc.png" alt="">';
                html += '</span>';
                html += '<h6 class="category-title">' + val['skills'] +
                    '</h6>';
                html += '</a></li>';
                html += '</ul>';
                html += '</div>';
                html += '</div>';
                $('#allcategory').html(html);

            });
            $('#uploadimg').html('<img class="img-fluid" src="https://tryyourwork.com/docladder/public/assets/images/' + res['title']['logo'] + '" alt="">');
            $('#categorytitle').html(res['title']['designation']);

            $("#categoryModalCenter").modal('show');
        },
        error: function(err) {
            console.log('Erro', err)
        }
    });
}


