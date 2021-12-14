<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            <strong class="text-primary">Navigation</strong>
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="index">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Vendors Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="viewvendors">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View vendors
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Reseller Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="view-reseller">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View Reseller
                                </a>
                                <a href="view-reseller-commision">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View Reseller data
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-money" aria-hidden="true"></i>
                            <span>Payment</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="payment-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View Payment
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span>Product Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="viewProducts">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View products
                                </a>
                            </li>
                            <li>
                                <a href="updateProductDiscount">
                                    <i class="fa fa-tag" aria-hidden="true"></i> Update product discount
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span>Delivery Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="setDeliveryCategories">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Set Delivery Pincodes
                                </a>
                            </li>
                            <li>
                                <a href="updateDeliveryCategories">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Update Delivery Pincodes
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i aria-hidden="true">%</i>
                            <span>Tax Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="updateTax">
                                    <i class="fa fa-tag" aria-hidden="true"></i> Update Yuvakasanga Margin Tax
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <img src="../lander-assets/images/wa.png" width="20" height="20">&nbsp;
                            <span>Whatsapp Order</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="addWoSellers">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add Seller Details
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="nav-parent">
                        <a>
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="vendor_reports">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Vendor Reports
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-tag" aria-hidden="true"></i>
                            <span>Ship Rocket Update</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="view-order-status">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Process Vendors order
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-tag" aria-hidden="true"></i>
                            <span>View Order Details</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="view-orders">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View Invoice
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-file" aria-hidden="true"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="admin-report">
                                    <i class="fa fa-file" aria-hidden="true"></i> Admin report
                                </a>
                            </li>
                            <li>
                                <a href="vendor-list">
                                    <i class="fa fa-file" aria-hidden="true"></i> Vendor report
                                </a>
                            </li>
                            <li>
                                <a href="reseller-list">
                                    <i class="fa fa-file" aria-hidden="true"></i> Reseller report
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="source/logout.php">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

</aside>