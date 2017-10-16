
        <div class="container-fluid">
            <div class="block-header">
                <h2>FORM EXAMPLES</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VERTICAL LAYOUT
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" novalidate="novalidate">

                                <label for="name">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="name" type="text" id="name" class="form-control" placeholder="Enter name" required aria-required="true">
                                    </div>
                                </div>
                                <label for="email">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="email" type="email" id="email" class="form-control" placeholder="Enter email" required aria-required="true">
                                    </div>
                                </div>
                                <label for="phone">Telephone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="phone" type="text" id="phone" class="form-control" placeholder="Enter phone" required aria-required="true">
                                    </div>
                                </div>
                                <label for="role">Role</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="group" class=" form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="Registrar">Registrar</option>
                                            <option value="View-admin">View-Admin</option>
                                            <option value="Super-Admin">Super-Admin</option>
                                        </select>
                                    </div>
                                </div>




                                <!-- <div class="col-sm-6">
                                    <select class="form-group form-control show-tick">
                                        <option value="">-- Please select --</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div> -->

                                <input type="hidden" class="form-control" name="request" value="user-new" >

                                <br>

                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
            
            
            
            
        </div>