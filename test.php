<!DOCTYPE html>
<head>
    <link  rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
    <script src="https://code.angularjs.org/1.3.0/angular.js"></script>
    <script  src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Product+Sans" rel="stylesheet" type="text/css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>
<style>
    a {
        cursor: pointer;
    }
</style>
<div ng-app="app">
    <div ng-controller="ExampleController as vm" class="container">
        <div class="text-center">
            <h1>AngularJS - Pagination Example with logic like Google</h1>

            <!-- items being paged -->
            <div ng-repeat="item in vm.items">Item {{item}}</div>

            <!-- pager -->
            <ul ng-if="vm.pager.pages.length" class="pagination">
                <li ng-class="{disabled:vm.pager.currentPage === 1}">
                    <a ng-click="vm.setPage(1)">First</a>
                </li>
                <li ng-class="{disabled:vm.pager.currentPage === 1}">
                    <a ng-click="vm.setPage(vm.pager.currentPage - 1)">Previous</a>
                </li>
                <li ng-repeat="page in vm.pager.pages" ng-class="{active:vm.pager.currentPage === page}">
                    <a ng-click="vm.setPage(page)">{{page}}</a>
                </li>
                <li ng-class="{disabled:vm.pager.currentPage === vm.pager.totalPages}">
                    <a ng-click="vm.setPage(vm.pager.currentPage + 1)">Next</a>
                </li>
                <li ng-class="{disabled:vm.pager.currentPage === vm.pager.totalPages}">
                    <a ng-click="vm.setPage(vm.pager.totalPages)">Last</a>
                </li>
            </ul>
        </div>
    </div>
    <hr />
    <div class="credits text-center">
        <p>
            <a href="http://jasonwatmore.com/post/2016/01/31/AngularJS-Pagination-Example-with-Logic-like-Google.aspx" target="_top">AngularJS - Pagination Example with logic like Google</a>
        </p>
        <p>
            <a href="http://jasonwatmore.com" target="_top">JasonWatmore.com</a>
        </p>
    </div>
    <script>
        (function() {
            'use strict';

            angular
                .module('app', [])
                .factory('PagerService', PagerService)
                .controller('ExampleController', ExampleController);

            function ExampleController(PagerService) {
                var vm = this;

                vm.dummyItems = _.range(1, 151); // dummy array of items to be paged
                vm.pager = {};
                vm.setPage = setPage;

                initController();

                function initController() {
                    // initialize to page 1
                    vm.setPage(1);
                }

                function setPage(page) {
                    if (page < 1 || page > vm.pager.totalPages) {
                        return;
                    }

                    // get pager object from service
                    vm.pager = PagerService.GetPager(vm.dummyItems.length, page);

                    // get current page of items
                    vm.items = vm.dummyItems.slice(vm.pager.startIndex, vm.pager.endIndex + 1);
                }
            }

            function PagerService() {
                // service definition
                var service = {};

                service.GetPager = GetPager;

                return service;

                // service implementation
                function GetPager(totalItems, currentPage, pageSize) {
                    // default to first page
                    currentPage = currentPage || 1;

                    // default page size is 10
                    pageSize = pageSize || 10;

                    // calculate total pages
                    var totalPages = Math.ceil(totalItems / pageSize);

                    var startPage, endPage;
                    if (totalPages <= 10) {
                        // less than 10 total pages so show all
                        startPage = 1;
                        endPage = totalPages;
                    } else {
                        // more than 10 total pages so calculate start and end pages
                        if (currentPage <= 6) {
                            startPage = 1;
                            endPage = 10;
                        } else if (currentPage + 4 >= totalPages) {
                            startPage = totalPages - 9;
                            endPage = totalPages;
                        } else {
                            startPage = currentPage - 5;
                            endPage = currentPage + 4;
                        }
                    }

                    // calculate start and end item indexes
                    var startIndex = (currentPage - 1) * pageSize;
                    var endIndex = Math.min(startIndex + pageSize - 1, totalItems - 1);

                    // create an array of pages to ng-repeat in the pager control
                    var pages = _.range(startPage, endPage + 1);

                    // return object with all pager properties required by the view
                    return {
                        totalItems: totalItems,
                        currentPage: currentPage,
                        pageSize: pageSize,
                        totalPages: totalPages,
                        startPage: startPage,
                        endPage: endPage,
                        startIndex: startIndex,
                        endIndex: endIndex,
                        pages: pages
                    };
                }
            }
        })();
    </script>
</div>

<?php
        include 'curl_funcs.php';
        $a = curl_getAll('/db/doggos/');
        $b = array();
        $c = "jason";

        foreach ($a as $data){

            if(stripos($data['name'], $c) !== false or strpos($data['breed'], $c) !== false or strpos($data['type'], $c) !== false or  strpos($data['gender'], $c) !== false){

                array_push($b, $data);
                echo "waw";
            }
        }
        print_r($b);
    ?>

