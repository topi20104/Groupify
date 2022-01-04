#!/usr/bin/env python
import pandas as pd
import numpy as np

# Grouping function
def grouping(group, min_memb, max_memb, alpha = 0):
    distance = [0]
    for i in range(len(group) - 1):
        distance.append(abs(group.iloc[i + 1]["rating"] - group.iloc[i]["rating"]))
    group["distance"] = distance
    median_dist = group.median()["distance"] + alpha
    student = 0
    group_num = 0
    groups_dict = {}
    while student < len(group):
        key_name = str(group_num)
        groups_dict[key_name] = group.iloc[[]]
        if student + 1 != len(group):
            groups_dict[key_name] = groups_dict[key_name].append(group.iloc[[student]])
            student = student + 1
        elif student + 1 == len(group):
            groups_dict[key_name] = groups_dict[key_name].append(group.iloc[[student]])
            break
        else:
            break
        if min_memb != 1:
            while len(groups_dict[key_name]) < min_memb:
                groups_dict[key_name] = groups_dict[key_name].append(group.iloc[[student]])
                if student + 1 != len(group):
                    student = student + 1
                else:
                    break
                if len(groups_dict[key_name]) == min_memb:
                    while len(groups_dict[key_name]) < max_memb:
                        if group.iloc[student]["distance"] < median_dist:
                            groups_dict[key_name] = groups_dict[key_name].append(group.iloc[[student]])
                            if student + 1 != len(group):
                                student = student + 1
                            else:
                                break
                        else:
                            break
        elif min_memb == 1:
            while len(groups_dict[key_name]) < max_memb:
                if group.iloc[student]["distance"] < median_dist:
                    groups_dict[key_name] = groups_dict[key_name].append(group.iloc[[student]])
                    if student + 1 != len(group):
                        student = student + 1
                    else:
                        break
                else:
                    break
        if student + 1 == len(group) and group.index.values[-1] == groups_dict[key_name].index.values[-1]:
            break
        group_num = group_num + 1
    return groups_dict
