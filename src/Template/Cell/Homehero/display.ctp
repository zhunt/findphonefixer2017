<!--Hero Image-->
<section class="hero-image search-filter-middle height-500">
    <div class="inner">
        <div class="container">
            <h1>Find a Place to Fix Your Phone</h1>
            <div class="search-bar horizontal">
                <form class="main-search border-less-inputs background-dark narrow" role="form" method="post" action="?">
                    <div class="input-row">
                        <!--
                        <div class="form-group">
                            <label for="keyword">Keyword</label>
                            <input type="text" class="form-control" id="keyword" placeholder="Enter Keyword">
                        </div>
                        -->
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="model">Store Type</label>
                            <select name="model" id="model" multiple title="Any" data-live-search="true">
                                <option value="1" selected>Phone Repair</option>
                                <option value="3">Cases / Accessories</option>
                                <option value="4">On-site Service</option>
                                <option value="5">Online Service</option>
                                <option value="6">Phone Parts</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="location">Location</label>
                            <!--
                            <div class="input-group location">
                                <input type="text" class="form-control" id="location" placeholder="Enter Location">
                            </div>
                            -->
                            <select name="model" id="location" multiple title="Any" data-live-search="true">

                                <optgroup label="Toronto / GTA">
                                    <option value="1" selected>Toronto</option>
                                    <option value="2">Mississauga</option>
                                </optgroup>
                                <option value="3">Vancouver</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </form>
                <!-- /.main-search -->
            </div>
            <!-- /.search-bar -->
        </div>
    </div>
    <div class="background">
        <img src="/img/title-bg-1.jpg" alt="background phone fixer image">
    </div>
</section>

<!--end Hero Image-->