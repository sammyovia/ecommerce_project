<form action="{{ route('checkout.stripe') }}" method="POST">
    @csrf
    @method('POST')
    <button class="btn btn-primary" type="submit">Place an order</button>
</form>