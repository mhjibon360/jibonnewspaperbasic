<div class="themesBazar_widget">
    <h3 style="margin-top:5px"> OLD NEWS </h3>
</div>

<form class="wordpress-date" action="{{ route('old.news') }}" method="post">
    @csrf
    @method('GET')
    <input type="date" id="wordpress" placeholder="Select Date" autocomplete="off" value="" name="old_news"
        required="" class="hasDatepicker">
    <input type="submit" value="Search">
</form>
