<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\List_Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Session::get('login')) {
                return redirect('Login')->with('alert', 'Kamu harus login dulu');
            } else {
                return $next($request);
            }
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        $list_items = List_Item::where('list_items_id', 'like', '%' . $query . '%')
            ->orWhere('list_items_name', 'like', '%' . $query . '%')
            ->orWhere('created_at', 'like', '%' . $query . '%')->get();
        if ($request->ajax()) {
            return view('searchb', compact('list_items'))->render();
        } else {
            // $transactions = Transaction::orderBy('transactions_id', 'ASC')->get();
            return view('transaction', compact('list_items'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        return view('transaction');
    }
    public function addToCart($id)
    {
        $product = List_Item::find($id);

        if (!$product) {

            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $id => [
                    "iditem" => $product->list_items_id,
                    "name" => $product->list_items_name,
                    "quantity" => 1,
                    "price" => $product->list_items_price,
                ]
            ];

            session()->put('cart', $cart);

            $htmlCart = view('cart')->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1; 

            session()->put('cart', $cart);

            $htmlCart = view('cart')->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "iditem" => $product->list_items_id,
            "name" => $product->list_items_name,
            "quantity" => 1,
            "price" => $product->list_items_price,
        ];

        session()->put('cart', $cart);

        $htmlCart = view('cart')->render();

        return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart]);

        //return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

            $total = $this->getCartTotal();

            $htmlCart = view('cart')->render();

            return response()->json(['msg' => 'Cart updated successfully', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('cart')->render();

            return response()->json(['msg' => 'Product removed successfully', 'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'Product removed successfully');
        }
    }


    /**
     * getCartTotal
     *
     *
     * @return float|int
     */
    private function getCartTotal()
    {
        $total = 0;

        $cart = session()->get('cart');

        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return number_format($total,2,',','.');
    }
}
