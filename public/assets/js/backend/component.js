define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'component/index' + location.search,
                    add_url: 'component/add',
                    edit_url: 'component/edit',
                    del_url: 'component/del',
                    multi_url: 'component/multi',
                    import_url: 'component/import',
                    table: 'component',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('Name')},
                        {field: 'category_id', title: __('Category_id')},
                        {field: 'category_child_id', title: __('Category_child_id')},
                        {field: 'description', title: __('Description')},
                        {field: 'size', title: __('Size')},
                        // {field: 'rules', title: __('Rules')},
                        {field: 'price', title: __('Price'), operate:'BETWEEN'},
                        {field: 'image', title: __('Image'), events: Table.api.events.image, formatter: Table.api.formatter.image},
                        // {field: 'attachfile', title: __('Attachfile')},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'is_private', title: __('Is_private')},
                        {field: 'status', title: __('Status'), formatter: Table.api.formatter.status},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            $(document).on('change', "#c-category_id", function () {
                $("#c-category_child_id").selectPageClear();
            })


            $("#c-category_child_id").data("params", function (obj) {
                var val = $("#c-category_id").val();
                return {custom: {pid:val}};
            });
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});