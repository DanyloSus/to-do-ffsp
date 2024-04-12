"use client";

import { ToDoType } from "@/types/ToDo";
import axios from "axios";
import TimeAgo from "javascript-time-ago";
import Link from "next/link";
import React, { useEffect, useState } from "react";
import en from "javascript-time-ago/locale/en";

TimeAgo.addDefaultLocale(en);

const ToDo = ({ params }: { params: { id: string } }) => {
  const [toDoData, setToDoData] = useState<ToDoType>();

  useEffect(() => {
    axios.get(`/api/${params.id}`).then((res) => setToDoData(res.data.toDo));
  }, []);

  const daysFromToday = (date: Date | undefined) => {
    if (date) {
      const timeAgo = new TimeAgo("en-US");

      console.log(new Date(date));

      const formattedDate = timeAgo.format(new Date(date).getTime());

      return formattedDate;
    }
  };

  return (
    <div>
      <h2 className="font-bold text-3xl">{toDoData?.title}</h2>
      <div className="flex flex-col gap-3 items-center">
        <p>{toDoData?.completed ? "" : "Not"} Completed</p>
        <p>{toDoData?.description}</p>
        <p>Created: {daysFromToday(toDoData?.createdAt)}</p>
        <p>Updated: {daysFromToday(toDoData?.updatedAt)}</p>
        <Link href={`/create/${toDoData?._id}`} className="btn w-min">
          Edit
        </Link>
        <div>
          <button>Toogle</button>
        </div>
        <div>
          <button>Delete</button>
        </div>
      </div>
    </div>
  );
};

export default ToDo;