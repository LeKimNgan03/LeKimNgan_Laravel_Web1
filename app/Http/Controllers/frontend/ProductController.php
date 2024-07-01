<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $list_product = Product::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view("frontend.product", compact('list_product'));
    }

    public function product_detail($slug)
    {
        $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        $listcatid = $this->getlistcategoryid(($product->category_id));
        $list_product = Product::where([['status', '=', 1], ['id', '!=', $product->id]])
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        return view("frontend.product_detail", compact('product', 'list_product'));
    }

    public function category($slug)
    {
        $row_category = Category::where([["slug", "=", $slug], ['status', '=', 1]])
            ->select('id', 'name', 'slug')
            ->first();
        $listcatid = [];
        if ($row_category != null) {
            $listcatid = $this->getlistcategoryid(($row_category->id));
        }
        $list_product = Product::where('status', '=', 1)
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        return view("frontend.product_category", compact("list_product", 'row_category'));
    }

    public function getlistcategoryid($rowid)
    {
        $listcatid = [];
        array_push($listcatid, $rowid);
        $list1 = Category::where([['parent_id', '=', $rowid], ['status', '=', 1]])
            ->select('id')
            ->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listcatid, $row1->id);
                $list2 = Category::where([['parent_id', '=', $row1->id], ['status', '=', 1]])
                    ->select('id')
                    ->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listcatid, $row2->id);
                    }
                }
            }
        }
        return $listcatid;
    }

    public function getlistbrandid($rowid)
    {
        $listbrandid = [];
        array_push($listbrandid, $rowid);
        $list1 = Brand::where([['parent_id', '=', $rowid], ['status', '=', 1]])->select('id')->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listbrandid, $row1->id);
                $list2 = Brand::where([['parent_id', '=', $row1->id], ['status', '=', 1]])->select('id')->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listcatid, $row2->id);
                    }
                }
            }
        }
        return $listbrandid;
    }

    public function brand($slug)
    {
        $row_brand = Brand::where([["slug", "=", $slug], ['status', '=', 1]])->select('id', 'name', 'slug')->first();
        $listbrandid = [];
        if ($row_brand != null) {
            $listbrandid = $this->getlistbrandid(($row_brand->id));
        }
        $list_product = Product::where('status', '=', 1)
            ->whereIn('brand_id', $listbrandid)
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        return view("frontend.product_brand", compact("list_product", 'row_brand'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::query()
            ->where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(8);

        return view('products.search', [
            'products' => $products,
            'query' => $query,
        ]);
    }
}
