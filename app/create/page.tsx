"use client";

import axios from "axios";
import { useFormik } from "formik";
import { useRouter } from "next/navigation";
import React from "react";
import * as Yup from "yup";

const Create = () => {
  const router = useRouter();

  const formik = useFormik({
    initialValues: { title: "", description: "" },
    validationSchema: Yup.object({
      title: Yup.string().required().max(255),
      description: Yup.string().required(),
    }),
    validateOnChange: false,
    onSubmit: async (value) => {
      const res = await axios.post("/api/create", value);
      if (res.data.message) {
        formik.setErrors({ description: res.data.message });
        return;
      }
      router.push(`/${res.data.toDo._id}`);
    },
  });

  return (
    <div>
      <h2 className="font-bold text-3xl">Create To Do</h2>
      <div>
        <form className="flex flex-col gap-3" onSubmit={formik.handleSubmit}>
          <div>
            <label htmlFor="title">Title</label>
            <input
              id="title"
              name="title"
              onChange={formik.handleChange}
              value={formik.values.title}
            />
            <br />
            {formik.errors.title ?? <p>{formik.errors.title}</p>}
          </div>
          <div>
            <label htmlFor="description">Description</label>
            <textarea
              id="description"
              name="description"
              onChange={formik.handleChange}
              value={formik.values.description}
            ></textarea>
            <br />
            {formik.errors.description ?? <p>{formik.errors.description}</p>}
          </div>
          <div>
            <button type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default Create;
