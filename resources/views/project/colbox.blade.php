@foreach ($projects as $project )
    

<div class="ttm-box-col-wrapper col-lg-4 col-md-6 col-sm-12">
    <div class="featured-imagebox featured-imagebox-portfolio">
        <div class="featured-thumbnail">
            <a href="#">
                <img class="img-fluid" src="{{url('')}}/Project-image/{{$project->image}}" >
            </a>
        </div>
        <div class="ttm-box-view-overlay ttm-portfolio-box-view-overlay">
            <div class="ttm-box-view-content-inner">
                <div class="featured-content featured-content-portfolio">
                    <span class="category">
                        {{-- <a href="#">{{ $project->category->title }}</a> --}}
                    </span>
                    <h2 class="featured-title">
                        <a href="{{ url('projects-details/' . $project->slug) }}"
                            >{{$project->project_name}}</a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- @if($projects->isEmpty()) --}}
{{-- <p>No projects found for this category.</p> --}}
{{-- @endif --}}
