let btn = $("button[value='vote']")

    console.log(btn)

    btn.click(function(e){
        ctxBtn = $(e.currentTarget)
        $.ajax({
            type: 'POST',
            url: 'vote',
            data: { 
                postslug: ctxBtn.data('postslug'),
                vote: ctxBtn.data('vote'),
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                $(`#voteCount[postslug=${result['postslug']}]`).html(result['likes'])
            }
        });
    })