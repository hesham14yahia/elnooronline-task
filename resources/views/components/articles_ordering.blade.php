<div class="row">
    <form class="col-md-offset-9 col-md-3 ordering-form" action="{{ request()->url() }}" method="GET">
        <div class="form-group">
            <label for="sel1">Order by:</label>
            <select class="form-control" name="order_by">
                <option>Order by</option>
                <option value="top_view" {{ app('request')->get('order_by') == "top_view" ? 'selected' : null }}>Top view</option>
                <option value="most_liked" {{ app('request')->get('order_by') == "most_liked" ? 'selected' : null }}>Most liked</option>
                <option value="recommended" {{ app('request')->get('order_by') == "recommended" ? 'selected' : null }}>Recommended</option>
            </select>
        </div>
    </form>
</div>
