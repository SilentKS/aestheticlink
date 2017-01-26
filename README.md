# aestheticlink

EPIC
Background

It is necessary to build the domain code so that we can approximate the know how level.

Delivery is proven by unit tests of the associated user stories and additional extensions/validations.

MAIN SUCCESS SCENARIO 

A customer inserts a coin and the turnstile unlocks
Customer passes and turnstile locks
Extensions

1.a Customer passes without inserting a coin

The turnstile will raise an alarm

2.b Customer inserts a coin again

Turnstile remains unlocked

User Story: Unlocking the turnstile
SCENARIO

Given the turnstile is locked

When I add a coin

The turnstile will unlock

User Story: Locking the turnstile
SCENARIO

Given the turnstile is unlocked

When I pass trough the turnstile

The turnstile will lock

User Story: Raising an alarm
SCENARIO

Given the turnstile is locked

When I pass

An alarm is triggered

And If I add a coin

The alarm will end

User Story: Gracefuly eating money
SCENARIO

Given the turnstile is locked

When I add a coin

And then another coin

The turnstile will be unlocked

And If I pass The turnstile will be locked
