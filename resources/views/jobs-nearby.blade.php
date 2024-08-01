<x-app-layout>
    <x-slot name="header">
        <h3>
            {{ __('Jobs nearby') }}
        </h3>
    </x-slot>

    <!-- =====Search bar====== -->
    <form action="{{url('search/jobs-nearby')}}" method="get">
        <div class="dv-search-bar">
            <input type="text" class="dv-input" name="search1" placeholder="Search for jobs nearby..." style="width:35%;" required>
            <input type="text" class="dv-input" name="search2" placeholder="Filter by location..."
                style="width:35%;border-top-left-radius:0px;border-bottom-left-radius:0px;" required>
            <button class="dv-btn">
                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="white"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15 10.5C15 12.9853 12.9853 15 10.5 15C8.01472 15 6 12.9853 6 10.5C6 8.01472 8.01472 6 10.5 6C12.9853 6 15 8.01472 15 10.5ZM14.1793 15.2399C13.1632 16.0297 11.8865 16.5 10.5 16.5C7.18629 16.5 4.5 13.8137 4.5 10.5C4.5 7.18629 7.18629 4.5 10.5 4.5C13.8137 4.5 16.5 7.18629 16.5 10.5C16.5 11.8865 16.0297 13.1632 15.2399 14.1792L20.0304 18.9697L18.9697 20.0303L14.1793 15.2399Z" />
                </svg>
            </button>
        </div>
    </form>
    <!-- =====End Search bar====== -->

    <br><br><br>
    @forelse ($data as $category =>$job)
        <div class="description-content">
            <!-- ===Title=== -->
            <div class="ctb-layer">
                <div class="job-category">
                    <div class="job-title">{{ $category }}</div>
                    <div class="job-track">{{ $counts[$category . 'Counts'] }}</div>
                </div>
                <a class="more">
                    <form action="{{ url('filter') }}" method="get">
                        <div class="ttd-layer"><b>Filter:</b>
                            <select class="filter-input" name="perPage" id="perPage" onchange="this.form.submit()">
                                <option value="">...</option>
                                <option value="4">4</option>
                                <option value="6">6</option>
                                <option value="8">8</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </form>
                </a>

            </div>
            <!-- ===End Title=== -->

            <div class="job-display">
                @forelse ($job as $job)
                    <div class="job-list">
                        <!-- =====Job Info======= -->
                        <div class="display-top">
                            <div class="icon-shape">{{ $job['first_letter'] }}</div>
                            <div class="job-info">
                                <b>{{ $job['job']->job_title }}</b>
                                <p>We are looking for...</p>
                            </div>
                        </div>
                        <br>
                        <!-- ========End Job Info======== -->

                        <!-- ======Contact Info===== -->
                        <div class="display-down">
                            <div class="display-contact">
                                <div class="icon-dsc"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 512 512">
                                        <circle cx="256" cy="192" r="32" />
                                        <path
                                            d="M256,32C167.78,32,96,100.65,96,185c0,40.17,18.31,93.59,54.42,158.78,29,52.34,62.55,99.67,80,123.22a31.75,31.75,0,0,0,51.22,0c17.42-23.55,51-70.88,80-123.22C397.69,278.61,416,225.19,416,185,416,100.65,344.22,32,256,32Zm0,224a64,64,0,1,1,64-64A64.07,64.07,0,0,1,256,256Z" />
                                    </svg></div>
                                <div class="dsc-details">{{ $job['job']->location }}</div>
                            </div><br>
                            <div class="display-contact">
                                <div class="icon-dsc"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 512 512">
                                        <path
                                            d="M424,80H88a56.06,56.06,0,0,0-56,56V376a56.06,56.06,0,0,0,56,56H424a56.06,56.06,0,0,0,56-56V136A56.06,56.06,0,0,0,424,80Zm-14.18,92.63-144,112a16,16,0,0,1-19.64,0l-144-112a16,16,0,1,1,19.64-25.26L256,251.73,390.18,147.37a16,16,0,0,1,19.64,25.26Z" />
                                    </svg></div>
                                <div class="dsc-details">{{ $job['job']->email }}</div>
                            </div><br>
                            <div class="display-contact">
                                <div class="icon-dsc"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 512 512">
                                        <path
                                            d="M391,480c-19.52,0-46.94-7.06-88-30-49.93-28-88.55-53.85-138.21-103.38C116.91,298.77,93.61,267.79,61,208.45c-36.84-67-30.56-102.12-23.54-117.13C45.82,73.38,58.16,62.65,74.11,52A176.3,176.3,0,0,1,102.75,36.8c1-.43,1.93-.84,2.76-1.21,4.95-2.23,12.45-5.6,21.95-2,6.34,2.38,12,7.25,20.86,16,18.17,17.92,43,57.83,52.16,77.43,6.15,13.21,10.22,21.93,10.23,31.71,0,11.45-5.76,20.28-12.75,29.81-1.31,1.79-2.61,3.5-3.87,5.16-7.61,10-9.28,12.89-8.18,18.05,2.23,10.37,18.86,41.24,46.19,68.51s57.31,42.85,67.72,45.07c5.38,1.15,8.33-.59,18.65-8.47,1.48-1.13,3-2.3,4.59-3.47,10.66-7.93,19.08-13.54,30.26-13.54h.06c9.73,0,18.06,4.22,31.86,11.18,18,9.08,59.11,33.59,77.14,51.78,8.77,8.84,13.66,14.48,16.05,20.81,3.6,9.53.21,17-2,22-.37.83-.78,1.74-1.21,2.75a176.49,176.49,0,0,1-15.29,28.58c-10.63,15.9-21.4,28.21-39.38,36.58A67.42,67.42,0,0,1,391,480Z" />
                                    </svg></div>
                                <div class="dsc-details">{{ $job['job']->contact }}</div>
                            </div><br>

                            <div class="display-contact" style="color:gray;padding-left:8px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 48 48" fill="gray">
                                    <title>time-alarm</title>
                                    <g id="Layer_2" data-name="Layer 2">
                                      <g id="invisible_box" data-name="invisible box">
                                        <rect width="20" height="20" fill="none"/>
                                      </g>
                                      <g id="icons_Q2" data-name="icons Q2">
                                        <path d="M24,12A15,15,0,1,1,9,27,15,15,0,0,1,24,12m0-4A19,19,0,1,0,43,27,19,19,0,0,0,24,8Z"/>
                                        <path d="M32,33a1.7,1.7,0,0,1-1-.3l-9-4.6V19a2,2,0,0,1,4,0v6.9l7,3.4a1.9,1.9,0,0,1,.7,2.7A1.9,1.9,0,0,1,32,33Z"/>
                                        <path d="M6,12a2.1,2.1,0,0,1-1.6-.8,2,2,0,0,1,.4-2.8l8-6a2,2,0,0,1,2.8.4,2,2,0,0,1-.4,2.8l-8,6A1.9,1.9,0,0,1,6,12Z"/>
                                        <path d="M42,12a1.9,1.9,0,0,1-1.2-.4l-8-6a2,2,0,0,1-.4-2.8,2,2,0,0,1,2.8-.4l8,6a2,2,0,0,1,.4,2.8A2.1,2.1,0,0,1,42,12Z"/>
                                      </g>
                                    </g>
                                  </svg> 
                                Posted {{$job['job']->created_at->diffForHumans()}}
                            </div>

                            <div class="display-contact" style="float:right;">
                                <a href="{{ url('job-details/' . $job['job']->id) }}"> <button class="btn-12">Read
                                        more</button></a>
                            </div>
                        </div>
                        <!-- =======End Contact Info====== -->
                    </div>
                @empty
                @endforelse
            </div><br>

            {{-- Pagination links --}}
            <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                {{ $pages[$category . 'Pages']->appends(['perPage' => $perPage])->links('pagination::default') }}
            </div>

        </div>
    @empty
        <div style="text-align: center;padding:10px 0 50px;">
            <span style="background-color:#fff;padding:20px;border-radius:8px;">{!! $result !!}</span>
        </div>
    @endforelse

</x-app-layout>
<style>
    .filter-input {
        padding: 6px;
        outline-color: #0095FF;
        border-color: #0095FF;
        margin-left: 8px;
        color: #0095FF;
    }

    body {
        background-image: url('{{ asset('assets/img/study-group-learning-library (1).jpg')}}');
        background-position: center;
        background-size: cover;
    }

    .job-list {
        margin-right: 20%;
    }

    .ttd-layer {
        display: flex;
        align-items: center;
    }

    .ctb-layer {
        padding-bottom: 0px;
        border-bottom: 1px solid #ddd;
    }

    .more {
        float: right;
        color: #0095FF;
        background-color: transparent;
        border-style: none;
        font-size: 15px;
        margin-top: 10px;
        user-select: none;
        cursor: pointer;
        padding-right: 30px;
        text-decoration: none;
    }

    .dv-search-bar {
        width: 100%;
        height: auto;
        padding: 40px;
        display: inline-flex;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
    }

    .dv-btn h3 {
        margin-top: -6px;
    }

    .dv-btn {
        width: auto;
        height: 50px;
        background: linear-gradient(to bottom, #0FFF, #0095FF);
        color: white;
        padding: 20px;
        font-size: 16px;
        border-style: none;
        display: flex;
        align-items: center;
        justify-content: center;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
    }

    .dv-input {
        outline-color: #0FFF;
        width: 70%;
        height: 50px;
        padding: 20px;
        font-size: 16px;
        border-top-left-radius: 50px;
        border-bottom-left-radius: 50px;
        border: 1px solid #ddd;
    }

    .btn-12 {
        width: auto;
        height: auto;
        padding: 10px;
        color: white;
        background: linear-gradient(to bottom, #0FFF, #0095FF);
        border-style: none;
        border-radius: 6px;
        box-shadow: 1px 2px 2px #0095FF;
    }

    .job-display {
        width: auto;
        height: auto;
        display: grid;
        padding: 10px;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 40px;
    }

    .display-down {
        width: auto;
        height: auto;
        display: block;
    }

    .display-contact {
        width: auto;
        height: auto;
        display: inline-flex;
        gap: 15px;
        margin-top: 10px;
    }

    .icon-dsc svg {
        fill: #0095FF;
    }

    .icon-dsc {
        width: auto;
        height: auto;
        border-radius: 50%;
        border-style: none;
        color: white;
        margin-left: 10px;
    }

    .job-info b {
        font-size: 20px;
        color: #0095FF;
    }

    .job-info p {
        font-size: 14px;
    }

    .display-top {
        width: auto;
        height: auto;
        display: inline-flex;
        gap: 15px;
    }

    .icon-shape {
        width: auto;
        height: auto;
        background: linear-gradient(to bottom, #0FFF, #0095FF);
        font-size: 30px;
        color: white;
        padding: 10px;
    }

    .job-category {
        width: auto;
        height: auto;
        display: inline-flex;
        gap: 20px;
        color: #0095FF;
        font-size: 18px;
    }

    .job-title {
        width: auto;
        height: auto;
        padding: 10px;
    }

    .job-track {
        width: auto;
        height: auto;
        padding: 10px;
        color: white;
        background: linear-gradient(to bottom, #0FFF, #0095FF);
        margin-bottom: 8px;
    }

    .description-content {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
        background-color: #fff;
        padding: 10px;
        border-radius: 8px;
    }
</style>
