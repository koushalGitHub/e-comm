<div id="posts">
<?php print_r($posts) ?>
    @foreach ($posts as $post)
        <!-- display post -->
       
    @endforeach
</div>

@if ($posts->hasPages())
    <div class="text-center">
        <button class="btn btn-primary load-more" data-page="{{ $page + 1 }}">Load More</button>
    </div>
@endif
<script src="https://code.jquery.com/jquery-3.6.4.js" ></script>
<script>
    $(document).on('click', '.load-more', function() {
        var page = $(this).data('page');
        $.ajax({
            url: '{{ url('/viewMore') }}?page=' + page,
            type: 'get',
            beforeSend: function() {
                $('.load-more').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            },
            success: function(response) {
                console.log(response)
                if (response) {
                    $('#posts').append(response);
                    $('.load-more').data('page', page + 1);
                } else {
                    $('.load-more').remove();
                }
            }
        });
    });
</script>

