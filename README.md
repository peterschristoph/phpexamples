# phpexamples

This little project should show and remind you again and again to write cleaner and readable code already with few possibilities. Basically, the improvements correspond to examples collected over the years (no real code, but equal in scheme) in Code Reviews. This reflects partly clean code approaches, but also my experience from different projects in the last years.

Often there are all time the same "failures" or not so good approaches. It's not about perfectionism, but having a maintainable code and therefore software that does what's expected.

TestClass.php
1. Try to use much less multiple return language construct per method
⋅⋅⋅Sometimes there are usefull, but not in this example - it's only confusing.
2. Use short notation, I think in newer code it's much more popular
3. Define default return data for method at first
4. Ensure the data in your object/class and trust in it
⋅⋅⋅Fewer checks required
