# common-core-vs-old-way
Testing old math vs new common core math with PHP

## Background
Unless you've been living under a rock, you've likely seen people getting excited or angry about "Common Core Math", which is a seemingly surprising departure from decades of how we approach mundane math problems.  I've heard heated arguments both FOR and AGAINST the new common core math concepts and I haven't fully landed on one side or the other in the debate.  If you're unfamiliar with Common Core, Google can help.

## Caveats
 * Human brain math and computer math are different beasts.  Results from a computer may not be the same from human testing.
 * My un-scientific Macbook environment can alternate in CPU availability and process priority - I compensated by alternating each test for more fair testing.
 * The Common Core way is programmatically more complex, requiring more code and ultimately taking longer.  I'm not sure if that should mean it's less ideal or if it means old math has an unfair advantage in this program.
 * I'm sure you CAN do a better job of this in [insert your language here] or improve upon what I spent an hour building.  Please add to it with a pull request.

## Disclaimer
While I see merit in the points each side present, I don't think it's that black and white.  So I decided to throw code at the problem both as a fun little challenge and to see what kind of results come out of it.  This is meant as a fun experiment and should not be considered in any way to be scientific proof of anything at all.

## Example Results
###1,000 cycles - random numbers between 1 and 1000.
 * Total time for the old way : 0.0071358680725098 seconds
 * Total time for the new way : 0.01004958152771 seconds

###100,000 cycles - random numbers between 1 and 1000.
 * Total time for the old way : 0.71134495735168 seconds
 * Total time for the new way : 0.97455978393555 seconds

###1,000,000 cycles - random numbers between 1 and 1000.
 * Total time for the old way : 6.9777636528015 seconds
 * Total time for the new way : 9.8461444377899 seconds

---

###100 cycles - random numbers between 1 and 10,000,000.
 * Total time for the old way : 0.00092959403991699 seconds
 * Total time for the new way : 0.0014877319335938 seconds

###100,000 cycles - random numbers between 1 and 10,000,000.
 * Total time for the old way : 1.0502970218658 seconds
 * Total time for the new way : 1.6906788349152 seconds

###1,000,000 cycles - random numbers between 1 and 10,000,000.
 * Total time for the old way : 22.028552055359 seconds
 * Total time for the new way : 34.783274650574 seconds

