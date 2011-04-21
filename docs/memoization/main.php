<p>
Structure for function memoizing, i.e. for f:X->Y, it should store (x,y) tuples.
</p><p>

Of course, there will be a limit of how many items to be stored. Let this limit be N. There are several ways to decide which items should be stored for how long. The best way probably would be to just store the most recent N items. So, if we add another item and we already have stored N items, we must know which was the latest item and remove that. If we request an item which is already in the memory, we should push that to the top of the recently requested items. So we need also to store a list / linear order of the items.
</p><p>

We want:
<ul>
<li> Add in constant time.
<li> Remove in constant time.
<li> Query/access in constant or at least logN time.
<li> Move item to top in constant time.
<li> Query bottom item in constant time.
</ul>
</p><p>

We can get that by a combination of a linked list with a hash map. Some simple Python implementation might look like:
</p>

<script src="https://gist.github.com/935544.js"> </script>

<hr>

<p>
When you want to have memoization globally for your application, you may want to have different limits for each function and you even may want to dynamically modify these limits in relation to how often a function is used.
</p><p>

One solution might be to use a global limit, a global hashmap with (f,x)->y entries and a global linked list. I'm not sure how well this would work in practice. A single recursive function could easily reset the whole database.
</p>

