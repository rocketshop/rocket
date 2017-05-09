
<!-- Product view -->


<list-view>

    <toolbar>
        
        <!-- Toolbar -->

    </toolbar>

    <item 
        :rearrangeable-items="false"
        :custom-fields="true"
        ref="product-list-view"
    >

        <!-- static fields -->

        <item-col>

            <!-- item -->

        </item-col>
        
        <item-col>
    
            <!-- item -->
    
        </item-col>
        
        <item-col>

            <!-- item -->
    
        </item-col>

        <!-- Custom Fields -->

        <custom-item-cols>
            
            <!-- cols -->

        </custom-item-cols>

    </item>

</list-view>


<bulk-view api="/api/products/bulk">

    <!-- bulk view -->

</bulk-view>


<detail-view api="/api/product/{id}">

    <!-- detailed view -->

</detail-view>




