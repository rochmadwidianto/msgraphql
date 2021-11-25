<?php include viewPath('includes/header'); ?>

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

    </div>
  </div>
</div>
<!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <div class="avatar-sm mx-auto mb-4">
                                                <span class="avatar-title rounded-circle bg-light font-size-24">
                                                    <i class="mdi mdi-account-group text-success"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-muted text-uppercase fw-semibold">Konsumen</p>
                                            <h4 class="mb-1 mt-1"><span class="counter-value" data-target="<?php echo $total_konsumen ?>">0</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <div class="avatar-sm mx-auto mb-4">
                                                <span class="avatar-title rounded-circle bg-light font-size-24">
                                                    <i class="mdi mdi-layers-triple-outline text-primary"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-muted text-uppercase fw-semibold">Inventory</p>
                                            <h4 class="mb-1 mt-1"><span class="counter-value" data-target="<?php echo $total_inventory ?>">0</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <div class="avatar-sm mx-auto mb-4">
                                                <span class="avatar-title rounded-circle bg-light font-size-24">
                                                    <i class="mdi mdi-cash-register text-warning"></i>
                                                </span>
                                              </div>
                                        </div>
                                        <div>
                                            <p class="text-muted text-uppercase fw-semibold">Penjualan</p>
                                            <h4 class="mb-1 mt-1"><span class="counter-value" data-target="<?php echo $total_penjualan ?>">0</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row-->

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card card-height-100">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Statistik</h4>

                                        <div class="mt-1">
                                            <ul class="list-inline main-chart mb-0">
                                                <li class="list-inline-item chart-border-left me-0">
                                                    <h3><span data-plugin="counterup"><?php echo $total_konsumen ?></span><span class="text-muted d-inline-block fw-normal font-size-15 ms-3">Konsumen</span>
                                                    </h3>
                                                </li>
                                                <li class="list-inline-item chart-border-left me-0">
                                                    <h3><span data-plugin="counterup"><?php echo $total_inventory ?></span><span class="text-muted d-inline-block fw-normal font-size-15 ms-3">Inventory</span></h3>
                                                </li>
                                                <li class="list-inline-item chart-border-left me-0">
                                                    <h3><span data-plugin="counterup"><?php echo $total_penjualan ?></span><span class="text-muted d-inline-block fw-normal font-size-15 ms-3">Penjualan</span></h3>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="mt-3">
                                            <div id="statistic-chart" class="apex-charts" dir="ltr"></div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <!-- end row -->

<?php include viewPath('includes/footer'); ?>

<script>
var options={
    chart:{
        height:338,
        type:"line",
        stacked:!1,
        offsetY:-5,
        toolbar:{
            show:true
        }
    },
    stroke:{
        width:[0,0,0,1],
        curve:"smooth"
    },
    plotOptions:{
        bar:{
            columnWidth:"40%"
        }
    },
    colors:["#2cb57e","#0576b9","#f1b44c"],
    series:[
        {
            name:"Konsumen",
            type:"column",
            data:<?php echo $arr_konsumen_by_month ?>
        },
        {
            name:"Inventory",
            type:"column",
            data:<?php echo $arr_inventory_by_month ?>
        },
        {
            name:"Penjualan",
            type:"area",
            data:<?php echo $arr_penjualan_by_month ?>
        }
    ],
    fill:{
        opacity:[.85,1,.25,1],
        gradient:{
            inverseColors:!1,
            shade:"light",
            type:"vertical",
            opacityFrom:.85,
            opacityTo:.55,
            stops:[0,100,100,100]
        }
    },
    labels:<?php echo $arr_bulan ?>,
    markers:{
        size:0
    },
    xaxis:{
        type:""
    },
    yaxis:{
        title:{
            text:"Jumlah"
        }
    },
    tooltip:{
        shared:!0,
        intersect:!1,
        y:{
            formatter:function(e){
                return void 0!==e?e.toFixed(0)+" data":e
            }
        }
    },
    grid:{
        borderColor:"#f1f1f1",
        padding:{
            bottom:15
        }
    }
},

chart=new ApexCharts(document.querySelector("#statistic-chart"),options);
chart.render();
</script>