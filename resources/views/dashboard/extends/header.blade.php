<div class="header">
    <div class="items d-flex align-items-center" style="width: 100%">
        <div class="search-container">
            <form id="search" action="{{ route('dashboard.search') }}" method="GET"
                class="d-flex align-items-center justify-content-between">
                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text" name="keyword" value="{{ request('keyword') }}"
                    placeholder="ابحث عن الأفلام والبرامج التلفزيونية ..." class="form-control"/>
            </form>

            <div class="d-md-flex  ">
                <button type="submit" class="btn btn-secondary me-3 mb-2" onclick="submitForm()">
                    بحث سريع
                </button>

                <a href="{{ route('dashboard.advanced-search') }} " class="btn btn-primary mb-2">
                    البحث المتقدم
                </a>
            </div>
        </div>
    </div>


    <div class="avatar">
        <a href="{{ route('dashboard.settings') }}">
            <img src="{{ auth()->user()->imageUrl() }}" alt="avatar"/>
        </a>
    </div>
</div>

<script>
    function submitForm() {
        let form = document.getElementById('search');
        form.submit();
    }
</script>
