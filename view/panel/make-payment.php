
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>FORM EXAMPLES</h2> -->
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                We accept <img src="images/card.png" alt="visa card / mastercard" style="width: 20%;">
                            </h2>
                            <!-- <ul class="header-dropdown m-r--5">
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
                            </ul> -->
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" novalidate="novalidate">

                                <label for="email_address">Currency</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="currency" class=" form-control show-tick">
                                            <option value="">-- Please select --</option>
                                            <option value="RWF">RWF</option>
                                            <option value="USD">USD</option>
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


                                <label for="amount">Amount</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="amount" type="number" id="amount" class="form-control" placeholder="Enter amount" required aria-required="true">
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" name="request" value="make-payment" >
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
            
            
            
            
        </div>