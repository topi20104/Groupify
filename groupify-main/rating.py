#!/usr/bin/env python
# Rating function
def rate(rel_grades, irrel_grades, motivation):
    a = 3 * rel_grades + irrel_grades + 0.5 * motivation
    return a
