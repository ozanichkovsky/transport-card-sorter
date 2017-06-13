## README ##

### Purpose of the code ###

Current library implements O(n) algorithm of sorting boarding cards.
 
### Implementation details ###

**Sorter** class implements boarding cards sorting by: 

1) creating hashtable of all boarding cards and hashtable of all destination
2) starting point is found as it is not in the list of keys of destination
3) simple one by one linking of source and destination points

Separate interfaces were added for a boarding card and string output.

Concrete boarding card classes use composition over inheritance just to show that
inheritance can be replace with composition.

It is possible to add other types of boarding cards by implementing **CardInterface**.





