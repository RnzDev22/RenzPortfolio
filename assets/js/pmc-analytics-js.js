 function RetainMultiSelect(elemid,values){
            
                options = Array.from(document.querySelectorAll('#'+elemid+' option'));
                values.split(',').forEach(function(v) {
                  options.find(c => c.value == v).selected = true;
                });
            
            //alert(val);
         } 






        /*sub report 1 start*/


  function f1_list_by_crop(CropSrcID){

          var  Link="../sub-report-pmc/inv_format1_by_crop_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&CropSrcID="+CropSrcID+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 


        
    function show_if1_by_crop(CropSrcID){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f1_list_by_crop(CropSrcID);
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 




        
    function show_if1_by_crop_seed(CropSrcID,SeedType){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f1_list_by_crop_seed(CropSrcID,SeedType);
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 



     function f1_list_by_crop_seed(CropSrcID,SeedSrcID){

          var  Link="../sub-report-pmc/inv_format1_by_crop_seed_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&CropSrcID="+CropSrcID+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup+"&SeedSrcID="+SeedSrcID

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 


        
    function show_if1_total_by_seed(SeedType){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f1_list_by_total_seed(SeedType);
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 


     function f1_list_by_total_seed(SeedSrcID){

          var  Link="../sub-report-pmc/inv_format1_by_seed_total_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup+"&SeedSrcID="+SeedSrcID

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 


     
    function f1_show_grand_total(){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f1_grand_total_list();
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 



  function f1_grand_total_list(){

          var  Link="../sub-report-pmc/inv_format1_grand_total_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&PrmCrop="+PrmCrop+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 
/*sub report 1 end*/


/*sub report 5 start*/


  function f5_list_by_region(RegionSrcID){

          var  Link="../sub-report-pmc/inv_format5_by_region_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&RegionSrcID="+RegionSrcID+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup+"&PrmCrop="+PrmCrop

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 


        
    function show_if5_by_region(RegionSrcID){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f5_list_by_region(RegionSrcID);
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 



  function f5_list_by_region_crop(RegionSrcID,CropSrcID){

          var  Link="../sub-report-pmc/inv_format5_by_region_crop_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&RegionSrcID="+RegionSrcID+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup+"&CropSrcID="+CropSrcID

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 


        
    function show_if5_by_region_crop(RegionSrcID,CropSrcID){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f5_list_by_region_crop(RegionSrcID,CropSrcID);
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 





  function f5_list_by_region_crop_total(CropSrcID){

          var  Link="../sub-report-pmc/inv_format5_by_region_crop_total_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup+"&CropSrcID="+CropSrcID

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 


        
    function show_if5_by_region_crop_total(CropSrcID){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f5_list_by_region_crop_total(CropSrcID);
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 




  function f5_grand_total_list(){

          var  Link="../sub-report-pmc/inv_format5_grand_total_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&PrmCrop="+PrmCrop+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 
   


     
    function f5_show_grand_total(){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f5_grand_total_list();
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 


/*sub report 5 end*/



/*sub report 6 start*/


  function f6_list_by_region(RegionSrcID){

          var  Link="../sub-report-pmc/inv_format6_by_region_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&RegionSrcID="+RegionSrcID+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup+"&PrmCrop="+PrmCrop

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 


        
    function show_if6_by_region(RegionSrcID){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f6_list_by_region(RegionSrcID);
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 



  function f6_list_by_region_crop(RegionSrcID,CropSrcID){

          var  Link="../sub-report-pmc/inv_format6_by_region_crop_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&RegionSrcID="+RegionSrcID+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup+"&CropSrcID="+CropSrcID

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 


        
    function show_if6_by_region_crop(RegionSrcID,CropSrcID){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f6_list_by_region_crop(RegionSrcID,CropSrcID);
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 





  function f6_list_by_region_crop_total(CropSrcID){

          var  Link="../sub-report-pmc/inv_format6_by_region_crop_total_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup+"&CropSrcID="+CropSrcID

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 


        
    function show_if6_by_region_crop_total(CropSrcID){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f6_list_by_region_crop_total(CropSrcID);
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 




  function f6_grand_total_list(){

          var  Link="../sub-report-pmc/inv_format6_grand_total_list?"+"&DateFrom="+DateFrom+"&DateTo="+DateTo+"&PrmDate="+PrmDate+"&PrmCrop="+PrmCrop+"&PrmRegion="+PrmRegion+"&PrmGroup="+PrmGroup

          PopupCenter(Link,"NSQCS DATABANK. VER.1",1200,600);

        } 
   


     
    function f6_show_grand_total(){

                         $.confirm({
                                title: 'View',
                                icon: 'glyphicon glyphicon-question-sign',      
                                content: '<b>Chart</b> &nbsp&nbsp&nbsp- by Crop <br> <b>Chart 2</b> - by Variety <br> <b>List</b>&nbsp&nbsp&nbsp&nbsp&nbsp - Individual List ',
                                type: 'green',
                                boxWidth: '25%',
                                useBootstrap: false,
                                buttons: {   
                                    ok: {
                                        text: "List",
                                        btnClass: 'btn-primary',
                                        keys: ['enter'],
                                        action: function(){                                          
                                          f6_grand_total_list();
                                        }
                                    },
                                   yes: {
                                        text: "Chart",
                                        btnClass: 'btn-success',
                                        keys: ['enter'],
                                        action: function(){
                                          //rpt3_chart_by_seed_total(Crop,Type);       
                                        }
                                    },    
                                    cancel: {
                                        text: "Chart 2",
                                        btnClass: 'btn-danger',
                                        keys: ['enter'],
                                        action: function(){
                                             //rpt3_chart_by_year_total(Crop,Type);   
                                        }
                                    },
                                }
                            });
        } 


/*sub report 6 end*/